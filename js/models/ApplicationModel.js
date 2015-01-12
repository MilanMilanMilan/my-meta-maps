/**
 * This is a basic Backbone.Model which tries to avoid multiple server requests with the same data (flooding)
 */
BaseModel = Backbone.Model.extend({
	enableAntiFlood: true,

	time: function() {
		return Math.floor(Date.now() / 1000);
	},
	isSameRequest: function(data) {
		var request = JSON.stringify(data.request);
		// If not old request available or last request is expired or request data is different => Allow new request
		if (BaseModel.last === null || BaseModel.last.expire < this.time() || JSON.stringify(BaseModel.last.request) !== request) {
			BaseModel.last = data;
			return false;
		}
		else {
			Debug.log('Anti-flooding for Backbone.Model in effect. Skipping request: ' + request);
			return true;
		}
	},
	serializeRequest: function(method, params) {
		return {
			expire: this.time() + 15, // Expire in 15 seconds
			request: {
				method: method,
				url: this.url(),
				params: params
			}
		};
	},
	fetch: function(options) {
		var data = this.serializeRequest('fetch', options);
		if (!this.enableAntiFlood || !this.isSameRequest(data)) {
			this.before(options);
			return Backbone.Model.prototype.fetch.call(this, options);
		}
		else {
			this.skipped(options);
			return null;
		}
	},
	save: function(key, val, options) {
		var data = this.serializeRequest('save', {key: key, val: val, options: options});
		if (!this.enableAntiFlood || !this.isSameRequest(data)) {
			this.before(key, val, options);
			return Backbone.Model.prototype.save.call(this, key, val, options);
		}
		else {
			this.skipped(key, val, options);
			return null;
		}
	},
	before: function(key, val, options) {
		if (key == null || typeof key === 'object') {
			attrs = key;
			options = val;
		} else {
			(attrs = {})[key] = val;
		}
		if (typeof (options) === "object" && typeof (options.before) === "function") {
			options.before();
		}
	},
	skipped: function(key, val, options) {
		if (key == null || typeof key === 'object') {
			attrs = key;
			options = val;
		} else {
			(attrs = {})[key] = val;
		}
		if (typeof (options) === "object" && typeof (options.skipped) === "function") {
			options.skipped();
		}
	}
});
// Statics
BaseModel.last = null;