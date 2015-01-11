/*
 * View for GeodataShow; showing geodata
 */
GeodataShowView = ContentView.extend({
	
	el: function() {
		return $('#showGeodata');
	},

	getPageContent: function() {
		return this.options.geodata; 
	},

	getPageTemplate: function() {
		return '/api/internal/doc/showGeodataBit';
	}
});



/*
 * View for CommentAddFirstStep
 */
CommentAddViewStep1 = ModalView.extend({ 

	getPageTemplate: function() {
		return '/api/internal/doc/addCommentFirstStep';
	},
    
    events: {
    	"click #addCommentBtn": "createComment"
    },

	/*
	 * This function is called when anybody creates a comment
	 */
	createComment: function(event) {
		Debug.log('Try to get metadata');
				
		// Creates primary details of a comment with typed in values
		var details = {
			"url" : $("#inputURL").val(),
			"datatype" : $("#inputDataType").val()
		};
			
		// Creates a new CommentAdd-Model
		commentAddFirstStepController(new CommentAddFirstStep(), details);
	}
});

/*
 * View for CommentAddSecondStep; will only shown after CommentAddViewStep1
 */
CommentAddViewStep2 = ContentView.extend({ 

	getPageTemplate: function() {
		return '/api/internal/doc/addCommentSecondStep';
	},

	getPageContent: function () {
		return this.options.metadata;
	},

	initialize: function () {
		if (typeof this.options.metadata.url === undefined) {
			MessageBox.addError('Es ist ein Fehler beim Laden der Metadaten aufgetreten. Bitte versuchen Sie erneut.');
		}
		else {
			this.render();
		}
	},
	
	onLoaded: function() {
        $('#ratingComment').barrating({ showSelectedRating:false });
		$("#inputDataType option[value='"+this.options.metadata.datatype+"']").attr('selected',true);
	},
    
    events: {
    	"click #addCommentSecondBtn": "createComment"
    },
	
	getGeometryFromMap: function() {
		// TODO: Get the geometry the user created from the map
		return null;
	},

	/*
	 * This function is called when anybody creates a comment
	 */
	createComment: function(event) {
		Debug.log('Try to add comment');
				
		// Creates further details of a comment with typed in values
		var details = {
			"url" : $("#inputURL").val(),
			"datatype" : $("#inputDataType").val(),
			"layer" : $("#inputLayer").val(),
			"text" : $("#inputText").val(),
			"geometry" : this.getGeometryFromMap(),
			"start": $("#inputStartDate").val(),
			"end": $("#inputEndDate").val(),		
			"rating": $("#ratingComment").val(),
			"title" : $("#inputTitle").val()
		};

		// Creates a new CommentAdd-Model
		commentAddSecondStepController(new CommentAddSecondStep(), details);
	}
});

/*
 * View for CommentsToGeodata
 */
CommentsShowView = ModalView.extend({

	getPageContent: function() {
		return this.options.geodata; 
	},

	getPageTemplate: function() {
		return '/api/internal/doc/showCommentsToGeodata';
	}
});