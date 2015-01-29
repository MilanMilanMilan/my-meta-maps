<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Client Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines are send to the client as JSON file to 
	| be used as javascript language phrases at client-side.
	|
	*/
	'close' => 'Schließen',
	'generalComm' => 'Allgemeine Kommentare',
	'commentAddQuickError' => 'Kommentar erstellen fehlgeschlagen',
	
	//variables for \js\controllers\userController.js
	
	'succededRegister' => 'Sie haben sich erfolgreich registriert und können sich nun anmelden.',
	'succededLogout' => 'Sie haben sich erfolgreich abgemeldet.',
	'failedLogout' => 'Die Abmeldung ist leider fehlgeschlagen.',
	'succededLogin' => 'Sie haben sich erfolgreich angemeldet.',
	'failedLogin' => 'Die Anmeldedaten sind nicht korrekt.',
	'succededChangeGeneral' => 'Ihre Profiländerungen wurden erfolgreich übernommen.',
	'succededChangePW' => 'Ihr neues Passwort wurde erfolgreich übernommen.',
	'specUse' => 'Die spezifizierten Daten können benutzt werden.',
	
	//variables for \js\controllers\commentController.js
	
	'searchShare' => 'Suchergebnisse teilen',
	'permLink' => 'Permalink wird generiert...',
	'noPerm' => 'Permalink konnte leider nicht generiert werden.',
	'tryAgain' => 'Bitte versuchen Sie es erneut.',
	'manyClicks' => 'Leider zu häufig geklickt.',
	'try15' => 'Bitte in 15 Sekunden erneut versuchen. ;)',
	'succededAddComm' => 'Ihr Kommentar wurde erfolgreich hinzugefügt.',
	'failedLoadGeodata' => 'Die Kommentare zu diesem Geodatensatz konnten nicht geladen werden.',
	'bboxInvalid' => 'Der angegebene Datensatz ist nicht kompatibel. Ursache könnte sein, dass derzeit nur Datensätze in WGS84 unterstützt werden.',
	
	//variables for \js\views\commentView.js
	
	'failedLoadMeta' =>	'Es ist ein Fehler beim Laden der Metadaten aufgetreten. Bitte versuche sie es erneut.',
	'disDraw' => 'Zeichnen deaktivieren',
	'drawPoint' => 'Zeichne einen Punkt',
	'drawLine' => 'Zeichne eine Linie',
	'drawPolygon' => 'Zeichne ein Polygon',

	//variables for \js\views\ApplicationView.js

	'paramNoLoad' => 'Die Parameter der Suche konnten leider nicht geladen werden',
	'noLoad' => 'Die Geodaten konnten nicht geladen werden.',

	//variables for \js\router.js

	'providerFail' => 'Die Anmeldung über den gewählten Anbieter ist leider fehlgeschlagen.',

	//variables for \js\helpers.js

	'basemaps' => 'Basemaps',
	'overlays' => 'Overlays',
	'userGeo' => 'Benutzerdefinierte Geometrien',
	'loading' => 'Lädt Daten...',
	'osm' => 'OpenStreetMap',
	'bingAerial' => 'BingMaps Luftbild',
	'bingLabel' => 'BingMaps Luftbild mit Beschriftung',
	'bingRoad' => 'BingMaps Straßen',
	'guest' => 'Gast',
	'logout' => 'Abmelden',
	'login' => 'Anmelden',
);
