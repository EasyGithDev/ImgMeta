<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ImgMeta\Exif;

/**
 * Description of ExifTags
 *
 * @author fbrusciano
 */
class ExifTags {

    /**
     * https://sno.phy.queensu.ca/~phil/exiftool/TagNames/EXIF.html
     */
    const InteropIndex = '0x0001';
    const InteropVersion = '0x0002';
    const ProcessingSoftware = '0x000b';
    const SubfileType = '0x00fe';
    const OldSubfileType = '0x00ff';
    const ImageWidth = '0x0100';
    const ImageHeight = '0x0101';
    const BitsPerSample = '0x0102';
    const Compression = '0x0103';
    const PhotometricInterpretation = '0x0106';
    const Thresholding = '0x0107';
    const CellWidth = '0x0108';
    const CellLength = '0x0109';
    const FillOrder = '0x010a';
    const DocumentName = '0x010d';
    const ImageDescription = '0x010e';
    const Make = '0x010f';
    const Model = '0x0110';
    const StripOffsets  = '0x0111';
    const Orientation = '0x0112';
    const SamplesPerPixel = '0x0115';
    const RowsPerStrip = '0x0116';
    const StripByteCounts  = '0x0117';
    const MinSampleValue = '0x0118';
    const MaxSampleValue = '0x0119';
    const XResolution = '0x011a';
    const YResolution = '0x011b';
    const PlanarConfiguration = '0x011c';
    const PageName = '0x011d';
    const XPosition = '0x011e';
    const YPosition = '0x011f';
    const FreeOffsets = '0x0120';
    const FreeByteCounts = '0x0121';
    const GrayResponseUnit = '0x0122';
    const GrayResponseCurve = '0x0123';
    const T4Options = '0x0124';
    const T6Options = '0x0125';
    const ResolutionUnit = '0x0128';
    const PageNumber = '0x0129';
    const ColorResponseUnit = '0x012c';
    const TransferFunction = '0x012d';
    const Software = '0x0131';
    const ModifyDate = '0x0132';
    const Artist = '0x013b';
    const HostComputer = '0x013c';
    const Predictor = '0x013d';
    const WhitePoint = '0x013e';
    const PrimaryChromaticities = '0x013f';
    const ColorMap = '0x0140';
    const HalftoneHints = '0x0141';
    const TileWidth = '0x0142';
    const TileLength = '0x0143';
    const TileOffsets = '0x0144';
    const TileByteCounts = '0x0145';
    const BadFaxLines = '0x0146';
    const CleanFaxData = '0x0147';
    const ConsecutiveBadFaxLines = '0x0148';
    const SubIFD  = '0x014a';
    const InkSet = '0x014c';
    const InkNames = '0x014d';
    const NumberofInks = '0x014e';
    const DotRange = '0x0150';
    const TargetPrinter = '0x0151';
    const ExtraSamples = '0x0152';
    const SampleFormat = '0x0153';
    const SMinSampleValue = '0x0154';
    const SMaxSampleValue = '0x0155';
    const TransferRange = '0x0156';
    const ClipPath = '0x0157';
    const XClipPathUnits = '0x0158';
    const YClipPathUnits = '0x0159';
    const Indexed = '0x015a';
    const JPEGTables = '0x015b';
    const OPIProxy = '0x015f';
    const GlobalParametersIFD = '0x0190';
    const ProfileType = '0x0191';
    const FaxProfile = '0x0192';
    const CodingMethods = '0x0193';
    const VersionYear = '0x0194';
    const ModeNumber = '0x0195';
    const Decode = '0x01b1';
    const DefaultImageColor = '0x01b2';
    const T82Options = '0x01b3';
    const JPEGProc = '0x0200';
    const ThumbnailOffset  = '0x0201';
    const ThumbnailLength  = '0x0202';
    const JPEGRestartInterval = '0x0203';
    const JPEGLosslessPredictors = '0x0205';
    const JPEGPointTransforms = '0x0206';
    const JPEGQTables = '0x0207';
    const JPEGDCTables = '0x0208';
    const JPEGACTables = '0x0209';
    const YCbCrCoefficients = '0x0211';
    const YCbCrSubSampling = '0x0212';
    const YCbCrPositioning = '0x0213';
    const ReferenceBlackWhite = '0x0214';
    const StripRowCounts = '0x022f';
    const ApplicationNotes = '0x02bc';
    const USPTOMiscellaneous = '0x03e7';
    const RelatedImageFileFormat = '0x1000';
    const RelatedImageWidth = '0x1001';
    const RelatedImageHeight = '0x1002';
    const Rating = '0x4746';
    const XP_DIP_XML = '0x4747';
    const StitchInfo = '0x4748';
    const RatingPercent = '0x4749';
    const SonyRawFileType = '0x7000';
    const SonyToneCurve = '0x7010';
    const VignettingCorrection = '0x7031';
    const VignettingCorrParams = '0x7032';
    const ChromaticAberrationCorrection = '0x7034';
    const ChromaticAberrationCorrParams = '0x7035';
    const DistortionCorrection = '0x7036';
    const DistortionCorrParams = '0x7037';
    const SonyCropTopLeft = '0x74c7';
    const SonyCropSize = '0x74c8';
    const ImageID = '0x800d';
    const WangTag1 = '0x80a3';
    const WangAnnotation = '0x80a4';
    const WangTag3 = '0x80a5';
    const WangTag4 = '0x80a6';
    const ImageReferencePoints = '0x80b9';
    const RegionXformTackPoint = '0x80ba';
    const WarpQuadrilateral = '0x80bb';
    const AffineTransformMat = '0x80bc';
    const Matteing = '0x80e3';
    const DataType = '0x80e4';
    const ImageDepth = '0x80e5';
    const TileDepth = '0x80e6';
    const ImageFullWidth = '0x8214';
    const ImageFullHeight = '0x8215';
    const TextureFormat = '0x8216';
    const WrapModes = '0x8217';
    const FovCot = '0x8218';
    const MatrixWorldToScreen = '0x8219';
    const MatrixWorldToCamera = '0x821a';
    const Model2 = '0x827d';
    const CFARepeatPatternDim = '0x828d';
    const CFAPattern2 = '0x828e';
    const BatteryLevel = '0x828f';
    const KodakIFD = '0x8290';
    const Copyright = '0x8298';
    const ExposureTime = '0x829a';
    const FNumber = '0x829d';
    const MDFileTag = '0x82a5';
    const MDScalePixel = '0x82a6';
    const MDColorTable = '0x82a7';
    const MDLabName = '0x82a8';
    const MDSampleInfo = '0x82a9';
    const MDPrepDate = '0x82aa';
    const MDPrepTime = '0x82ab';
    const MDFileUnits = '0x82ac';
    const PixelScale = '0x830e';
    const AdventScale = '0x8335';
    const AdventRevision = '0x8336';
    const UIC1Tag = '0x835c';
    const UIC2Tag = '0x835d';
    const UIC3Tag = '0x835e';
    const UIC4Tag = '0x835f';
    const IPTC_NAA = '0x83bb';
    const IntergraphPacketData = '0x847e';
    const IntergraphFlagRegisters = '0x847f';
    const IntergraphMatrix = '0x8480';
    const INGRReserved = '0x8481';
    const ModelTiePoint = '0x8482';
    const Site = '0x84e0';
    const ColorSequence = '0x84e1';
    const IT8Header = '0x84e2';
    const RasterPadding = '0x84e3';
    const BitsPerRunLength = '0x84e4';
    const BitsPerExtendedRunLength = '0x84e5';
    const ColorTable = '0x84e6';
    const ImageColorIndicator = '0x84e7';
    const BackgroundColorIndicator = '0x84e8';
    const ImageColorValue = '0x84e9';
    const BackgroundColorValue = '0x84ea';
    const PixelIntensityRange = '0x84eb';
    const TransparencyIndicator = '0x84ec';
    const ColorCharacterization = '0x84ed';
    const HCUsage = '0x84ee';
    const TrapIndicator = '0x84ef';
    const CMYKEquivalent = '0x84f0';
    const SEMInfo = '0x8546';
    const AFCP_IPTC = '0x8568';
    const PixelMagicJBIGOptions = '0x85b8';
    const JPLCartoIFD = '0x85d7';
    const ModelTransform = '0x85d8';
    const WB_GRGBLevels = '0x8602';
    const LeafData = '0x8606';
    const PhotoshopSettings = '0x8649';
    const ExifOffset = '0x8769';
    const ICC_Profile = '0x8773';
    const TIFF_FXExtensions = '0x877f';
    const MultiProfiles = '0x8780';
    const SharedData = '0x8781';
    const T88Options = '0x8782';
    const ImageLayer = '0x87ac';
    const GeoTiffDirectory = '0x87af';
    const GeoTiffDoubleParams = '0x87b0';
    const GeoTiffAsciiParams = '0x87b1';
    const JBIGOptions = '0x87be';
    const ExposureProgram = '0x8822';
    const SpectralSensitivity = '0x8824';
    const GPSInfo = '0x8825';
    const ISO = '0x8827';
    const Opto_ElectricConvFactor = '0x8828';
    const Interlace = '0x8829';
    const TimeZoneOffset = '0x882a';
    const SelfTimerMode = '0x882b';
    const SensitivityType = '0x8830';
    const StandardOutputSensitivity = '0x8831';
    const RecommendedExposureIndex = '0x8832';
    const ISOSpeed = '0x8833';
    const ISOSpeedLatitudeyyy = '0x8834';
    const ISOSpeedLatitudezzz = '0x8835';
    const FaxRecvParams = '0x885c';
    const FaxSubAddress = '0x885d';
    const FaxRecvTime = '0x885e';
    const FedexEDR = '0x8871';
    const LeafSubIFD = '0x888a';
    const ExifVersion = '0x9000';
    const DateTimeOriginal = '0x9003';
    const CreateDate = '0x9004';
    const GooglePlusUploadCode = '0x9009';
    const OffsetTime = '0x9010';
    const OffsetTimeOriginal = '0x9011';
    const OffsetTimeDigitized = '0x9012';
    const ComponentsConfiguration = '0x9101';
    const CompressedBitsPerPixel = 'x9102';
    const ShutterSpeedValue = '0x9201';
    const ApertureValue = '0x9202';
    const BrightnessValue = '0x9203';
    const ExposureCompensation = '0x9204';
    const MaxApertureValue = '0x9205';
    const SubjectDistance = '0x9206';
    const MeteringMode = '0x9207';
    const LightSource = '0x9208';
    const Flash = '0x9209';
    const FocalLength = '0x920a';
    const FlashEnergy = '0x920b';
    const SpatialFrequencyResponse = '0x920c';
    const Noise = '0x920d';
    const FocalPlaneXResolution = '0x920e';
    const FocalPlaneYResolution = '0x920f';
    const FocalPlaneResolutionUnit = '0x9210';
    const ImageNumber = '0x9211';
    const SecurityClassification = '0x9212';
    const ImageHistory = '0x9213';
    const SubjectArea = '0x9214';
    const ExposureIndex = '0x9215';
    const TIFF_EPStandardID = '0x9216';
    const SensingMethod = '0x9217';
    const CIP3DataFile = '0x923a';
    const CIP3Sheet = '0x923b';
    const CIP3Side = '0x923c';
    const StoNits = '0x923f';
    const MakerNoteApple  = '0x927c';
    const UserComment = '0x9286';
    const SubSecTime = '0x9290';
    const SubSecTimeOriginal = '0x9291';
    const SubSecTimeDigitized = '0x9292';
    const MSDocumentText = '0x932f';
    const MSPropertySetStorage = '0x9330';
    const MSDocumentTextPosition = '0x9331';
    const ImageSourceData = '0x935c';
    const AmbientTemperature = '0x9400';
    const Humidity = '0x9401';
    const Pressure = '0x9402';
    const WaterDepth = '0x9403';
    const Acceleration = '0x9404';
    const CameraElevationAngle = '0x9405';
    const XPTitle = '0x9c9b';
    const XPComment = '0x9c9c';
    const XPAuthor = '0x9c9d';
    const XPKeywords = '0x9c9e';
    const XPSubject = '0x9c9f';
    const FlashpixVersion = '0xa000';
    const ColorSpace = '0xa001';
    const ExifImageWidth = '0xa002';
    const ExifImageHeight = '0xa003';
    const RelatedSoundFile = '0xa004';
    const InteropOffset = '0xa005';
    const SamsungRawPointersOffset = '0xa010';
    const SamsungRawPointersLength = '0xa011';
    const SamsungRawByteOrder = '0xa101';
    const SamsungRawUnknown = '0xa102';
    const SubjectLocation = '0xa214';
    const FileSource = '0xa300';
    const SceneType = '0xa301';
    const CFAPattern = '0xa302';
    const CustomRendered = '0xa401';
    const ExposureMode = '0xa402';
    const WhiteBalance = '0xa403';
    const DigitalZoomRatio = '0xa404';
    const FocalLengthIn35mmFormat = '0xa405';
    const SceneCaptureType = '0xa406';
    const GainControl = '0xa407';
    const Contrast = '0xa408';
    const Saturation = '0xa409';
    const Sharpness = '0xa40a';
    const DeviceSettingDescription = '0xa40b';
    const SubjectDistanceRange = '0xa40c';
    const ImageUniqueID = '0xa420';
    const OwnerName = '0xa430';
    const SerialNumber = '0xa431';
    const LensInfo = '0xa432';
    const LensMake = '0xa433';
    const LensModel = '0xa434';
    const LensSerialNumber = '0xa435';
    const GDALMetadata = '0xa480';
    const GDALNoData = '0xa481';
    const Gamma = '0xa500';
    const ExpandSoftware = '0xafc0';
    const ExpandLens = '0xafc1';
    const ExpandFilm = '0xafc2';
    const ExpandFilterLens = '0xafc3';
    const ExpandScanner = '0xafc4';
    const ExpandFlashLamp = '0xafc5';
    const PixelFormat = '0xbc01';
    const Transformation = '0xbc02';
    const Uncompressed = '0xbc03';
    const ImageType = '0xbc04';
    const WidthResolution = '0xbc82';
    const HeightResolution = '0xbc83';
    const ImageOffset = '0xbcc0';
    const ImageByteCount = '0xbcc1';
    const AlphaOffset = '0xbcc2';
    const AlphaByteCount = '0xbcc3';
    const ImageDataDiscard = '0xbcc4';
    const AlphaDataDiscard = '0xbcc5';
    const OceScanjobDesc = '0xc427';
    const OceApplicationSelector = '0xc428';
    const OceIDNumber = '0xc429';
    const OceImageLogic = '0xc42a';
    const Annotations = '0xc44f';
    const PrintIM = '0xc4a5';
    const OriginalFileName = '0xc573';
    const USPTOOriginalContentType = '0xc580';
    const CR2CFAPattern = '0xc5e0';
    const DNGVersion = '0xc612';
    const DNGBackwardVersion = '0xc613';
    const UniqueCameraModel = '0xc614';
    const LocalizedCameraModel = '0xc615';
    const CFAPlaneColor = '0xc616';
    const CFALayout = '0xc617';
    const LinearizationTable = '0xc618';
    const BlackLevelRepeatDim = '0xc619';
    const BlackLevel = '0xc61a';
    const BlackLevelDeltaH = '0xc61b';
    const BlackLevelDeltaV = '0xc61c';
    const WhiteLevel = '0xc61d';
    const DefaultScale = '0xc61e';
    const DefaultCropOrigin = '0xc61f';
    const DefaultCropSize = '0xc620';
    const ColorMatrix1 = '0xc621';
    const ColorMatrix2 = '0xc622';
    const CameraCalibration1 = '0xc623';
    const CameraCalibration2 = '0xc624';
    const ReductionMatrix1 = '0xc625';
    const ReductionMatrix2 = '0xc626';
    const AnalogBalance = '0xc627';
    const AsShotNeutral = '0xc628';
    const AsShotWhiteXY = '0xc629';
    const BaselineExposure = '0xc62a';
    const BaselineNoise = '0xc62b';
    const BaselineSharpness = '0xc62c';
    const BayerGreenSplit = '0xc62d';
    const LinearResponseLimit = '0xc62e';
    const CameraSerialNumber = '0xc62f';
    const DNGLensInfo = '0xc630';
    const ChromaBlurRadius = '0xc631';
    const AntiAliasStrength = '0xc632';
    const ShadowScale = '0xc633';
    const SR2Private  = '0xc634';
    const MakerNoteSafety = '0xc635';
    const RawImageSegmentation = '0xc640';
    const CalibrationIlluminant1 = '0xc65a';
    const CalibrationIlluminant2 = '0xc65b';
    const BestQualityScale = '0xc65c';
    const RawDataUniqueID = '0xc65d';
    const AliasLayerMetadata = '0xc660';
    const OriginalRawFileName = '0xc68b';
    const OriginalRawFileData = '0xc68c';
    const ActiveArea = '0xc68d';
    const MaskedAreas = '0xc68e';
    const AsShotICCProfile = '0xc68f';
    const AsShotPreProfileMatrix = '0xc690';
    const CurrentICCProfile = '0xc691';
    const CurrentPreProfileMatrix = '0xc692';
    const ColorimetricReference = '0xc6bf';
    const SRawType = '0xc6c5';
    const PanasonicTitle = '0xc6d2';
    const PanasonicTitle2 = '0xc6d3';
    const CameraCalibrationSig = '0xc6f3';
    const ProfileCalibrationSig = '0xc6f4';
    const ProfileIFD = '0xc6f5';
    const AsShotProfileName = '0xc6f6';
    const NoiseReductionApplied = '0xc6f7';
    const ProfileName = '0xc6f8';
    const ProfileHueSatMapDims = '0xc6f9';
    const ProfileHueSatMapData1 = '0xc6fa';
    const ProfileHueSatMapData2 = '0xc6fb';
    const ProfileToneCurve = '0xc6fc';
    const ProfileEmbedPolicy = '0xc6fd';
    const ProfileCopyright = '0xc6fe';
    const ForwardMatrix1 = '0xc714';
    const ForwardMatrix2 = '0xc715';
    const PreviewApplicationName = '0xc716';
    const PreviewApplicationVersion = '0xc717';
    const PreviewSettingsName = '0xc718';
    const PreviewSettingsDigest = '0xc719';
    const PreviewColorSpace = '0xc71a';
    const PreviewDateTime = '0xc71b';
    const RawImageDigest = '0xc71c';
    const OriginalRawFileDigest = '0xc71d';
    const SubTileBlockSize = '0xc71e';
    const RowInterleaveFactor = '0xc71f';
    const ProfileLookTableDims = '0xc725';
    const ProfileLookTableData = '0xc726';
    const OpcodeList1 = '0xc740';
    const OpcodeList2 = '0xc741';
    const OpcodeList3 = '0xc74e';
    const NoiseProfile = '0xc761';
    const TimeCodes = '0xc763';
    const FrameRate = '0xc764';
    const TStop = '0xc772';
    const ReelName = '0xc789';
    const OriginalDefaultFinalSize = '0xc791';
    const OriginalBestQualitySize = '0xc792';
    const OriginalDefaultCropSize = '0xc793';
    const CameraLabel = '0xc7a1';
    const ProfileHueSatMapEncoding = '0xc7a3';
    const ProfileLookTableEncoding = '0xc7a4';
    const BaselineExposureOffset = '0xc7a5';
    const DefaultBlackRender = '0xc7a6';
    const NewRawImageDigest = '0xc7a7';
    const RawToPreviewGain = '0xc7a8';
    const CacheVersion = '0xc7aa';
    const DefaultUserCrop = '0xc7b5';
    const NikonNEFInfo = '0xc7d5';
    const Padding = '0xea1c';
    const OffsetSchema = '0xea1d';
    const Lens = '0xfdea';
    const KDC_IFD = '0xfe00';
    const RawFile = '0xfe4c';
    const Converter = '0xfe4d';
    const Exposure = '0xfe51';
    const Shadows = '0xfe52';
    const Brightness = '0xfe53';
    const Smoothness = '0xfe57';
    const MoireFilter = '0xfe58';

}
