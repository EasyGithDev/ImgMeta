# ImgMeta
Wrapper to access Exif and IPTC data from an image.



$stream = 'image.jpg';

OR

$stream = 'http://domain/image.jpg';


### Exif and Iptc

$imgData = new ImgData();
dump($imgData->read($stream)->getMetas($stream));

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

#### Fetch one tag, datas ara originals
dump($iptcManager->fetchAll(IptcTags::Country_PrimaryLocationName));


