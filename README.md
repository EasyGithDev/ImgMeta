# ImgMeta

Wrapper to access Exif and IPTC data from an image.

### Installing

Installation is quite typical - with composer:

```
composer require easygithdev/imgmeta:dev-master
```

## How to use

Include the autoload, if you need.

```
<?php

require 'vendor/autoload.php';

use ImgMeta\ImgData;
```

Define a stream. The stream is a file, a base64 string or an Url :

```
$stream = 'image.jpg';
$stream = 'data:image/jpeg;base64,iVBOR....';
$stream = 'http://domain/image.jpg';
```

Accessing to all the metas like this :

```
$imgData = new ImgData();
$metas = $imgData->read($stream)->getMetas();
```

Fetching the EXIF or IPTC tags :

```
$imgData->read($stream)->getExif()->fetch(ExifTags::Copyright);
$imgData->read($stream)->getIptc()->fetch(IptcTags::City);
```

### Working with EXIF only

Get all the datas :

```
$imgData = new ImgData();
$exifManager = $imgData->createExifManager();
$exifManager->read(ExifReader::getReader($stream));
$exifManager->getMetas();
```

Fetch one tag :

```
$exifManager->fetch(ExifTags::Copyright);
```

Or :

```
$exifManager->fetch('Copyright');
```

For example to fetch the GPS informations :

```
$latitude = $exifManager->fetch('GPSLatitude');
$longitude = $exifManager->fetch('GPSLongitude');
```

Using helper to get the GPS infos :

```
$exifManager->getPosition();
```

### Working on IPTC only

```
$imgData = new ImgData();
$iptcManager = $imgData->createIptcManager();
$iptcManager->read(IptcReader::getReader($stream));
```

Get IPTC default format :

```
$iptcManager->getMetas();
```

Get IPTC by Key :

```
$iptcManager->getMetasByKey();
```

Get IPTC by Name :

```
$iptcManager->getMetasByName();
```

Get IPTC by name with all keys :

```
$iptcManager->getAssocMetas(IptcManager::META_BY_NAME, true);
```

Fetch one tag, datas are flatten :

```
$iptcManager->fetch(IptcTags::Country_PrimaryLocationName);
```

Fetch one tag, datas are originals :

```
$iptcManager->fetchAll(IptcTags::Country_PrimaryLocationName);
```

## License

This project is licensed under GNU license - see the [LICENSE.md](LICENSE.md) file for deta
