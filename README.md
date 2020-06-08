# ImgMeta

Wrapper to access Exif and IPTC data from an image.

### Installing

Installation is quite typical - with composer:

```
Give the example
```

## How to use

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

### Exif

#### Working with Exif only
$imgData = new ImgData();

$exifManager = $imgData->createExifManager();

$exifManager->read(ExifReader::getReader($stream));

dump($exifManager->getMetas());

#### Fetch one tag
dump($exifManager->fetch(ExifTags::Copyright));

dump($exifManager->fetch('Copyright'));

#### Fetch GPS infos
$latitude = $exifManager->fetch('GPSLatitude');

$longitude = $exifManager->fetch('GPSLongitude');

dump($latitude, ' ', $longitude);

#### Using helper
dump($exifManager->getPosition());


### IPTC 

#### Working on IPTC only
$imgData = new ImgData();

$iptcManager = $imgData->createIptcManager();

$iptcManager->read(IptcReader::getReader($stream));


#### Get IPTC default format
dump($iptcManager->getMetas());

#### Get IPTC by KEY
dump($iptcManager->getMetasByKey());

#### Get IPTC by name
dump($iptcManager->getMetasByName());

#### Get IPTC by name with all keys
dump($iptcManager->getAssocMetas(IptcManager::META_BY_NAME, true));


#### Fetch one tag, datas are flatten
dump($iptcManager->fetch(IptcTags::Country_PrimaryLocationName));

#### Fetch one tag, datas are originals
dump($iptcManager->fetchAll(IptcTags::Country_PrimaryLocationName));
