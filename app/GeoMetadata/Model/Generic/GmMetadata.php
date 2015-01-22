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

namespace GeoMetadata\Model\Generic;

class GmMetadata implements \GeoMetadata\Model\Metadata, \GeoMetadata\Model\ExtraDataContainer {
	
	use \GeoMetadata\Model\BoundingBoxContainerTrait, \GeoMetadata\Model\ExtraDataContainerTrait, \GeoMetadata\Model\LayerContainerTrait;
	
	protected $url;
	protected $service;
	
	protected $title;
	protected $keywords;
	protected $abstract;
	protected $language;
	protected $author;
	protected $copyright;
	protected $license;

	protected $beginTime;
	protected $endTime;
	
	public function __construct() {
		$this->keywords = array();
	}

	public function createObject() {
		return new self();
	}

	public function getUrl(){
		return $this->url;
	}

	public function setUrl($url){
		$this->url = $url;
	}

	public function getServiceCode(){
		return $this->service;
	}

	public function setServiceCode($service){
		$this->service = $service;
	}

	public function getTitle(){
		return $this->title;
	}

	public function setTitle($title){
		$this->title = $title;
	}

	public function getKeywords(){
		return $this->keywords;
	}

	public function setKeywords(array $keywords){
		$this->keywords = $keywords;
	}

	public function addKeyword($keyword){
		$this->keywords[] = $keyword;
	}

	public function getAbstract(){
		return $this->abstract;
	}

	public function setAbstract($abstract){
		$this->abstract = $abstract;
	}

	public function getLanguage(){
		return $this->language;
	}

	public function setLanguage($language){
		$this->language = $language;
	}

	public function getAuthor(){
		return $this->author;
	}

	public function setAuthor($author){
		$this->author = $author;
	}

	public function getCopyright(){
		return $this->copyright;
	}

	public function setCopyright($copyright){
		$this->copyright = $copyright;
	}

	public function getLicense() {
		return $this->license;
	}

	public function setLicense($license) {
		$this->license = $license;
	}

	public function getBeginTime(){
		return $this->beginTime;
	}

	public function setBeginTime(\DateTime $begin = null){
		$this->beginTime = $begin;
	}

	public function getEndTime(){
		return $this->endTime;
	}

	public function setEndTime(\DateTime $end = null){
		$this->endTime = $end;
	}

	/**
	 * Returns a new instance of a class implementing the BoundingBox interface and 
	 * which is is compatible with this metadata implementation.
	 * 
	 * @return \GeoMetadata\Model\Generic\GmBoundingBox
	 */
	public function deliverBoundingBox() {
		return new GmBoundingBox();
	}

	public function deliverLayer() {
		return new GmLayer();
	}

}