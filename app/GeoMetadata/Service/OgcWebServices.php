<?php
/* 
 * Copyright 2014/15 Matthias Mohr
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace GeoMetadata\Service;

/**
 * Base class for OGC based webservices like WMS, WFS, OWS Common, etc.
 * 
 * Offers some common functionality and a core framework to write parsers for OGC based services.
 */
abstract class OgcWebServices extends XmlParser {
	
	use Traits\SimpleFillModelTrait, Traits\HttpGetTrait;
	
	/**
	 * Takes the user specified URL and builds the service (or base) url from it.
	 * 
	 * @param string $url URL
	 * @return string Base URL of the service
	 */
	public function getServiceUrl($url) {
		// For OGC based services we don't need to store the query parameters.
		// We always append the ? to the OGC base url.
		$index = strpos($url, '?');
		if ($index !== false) {
			return substr($url, 0, $index+1);
		}
		else {
			return $url . '?';
		}
	}
	
	/**
	 * Takes the user specified URL and builds the metadata url of the service from it.
	 * 
	 * @param string $url URL
	 * @return string URL giving the metadata for the service
	 */
	public function getMetadataUrl($url) {
		return $this->getServiceUrl($url) . "request=GetCapabilities&service=" . strtoupper($this->getCode());
	}

	/**
	 * Checks whether the given service data is of this type.
	 * 
	 * @param string $source String containing the data to parse.
	 * @return boolean true if content can be parsed, false if not.
	 */
	public function verify($source) {
		return (parent::verify($source) && $this->getUsedNamespace());
	}

}