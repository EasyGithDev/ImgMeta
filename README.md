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

### Working with Exif only

Get all the exif datas :

```
$imgData = new ImgData();
$exifManager = $imgData->createExifManager();
$exifManager->read(ExifReader::getReader($stream));
$exifManager->getMetas();
```

Fetch one tag :

```
$exifManager->fetch(ExifTags::Copyright);
$exifManager->fetch('Copyright');
```

Fetch GPS infos :

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
dump($iptcManager->getMetasByKey());
```

Get IPTC by Name :

```
dump($iptcManager->getMetasByName());
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

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for deta
