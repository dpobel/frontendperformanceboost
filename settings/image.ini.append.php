<?php /*

[ImageMagick]
# Removes image profiles to decrease the size of images
# see http://www.imagemagick.org/Usage/formats/#profiles
# the main point for performances, is to remove EXIF metadata
# that are rarely useful in small images
Filters[]=optimize=-strip

# Uncomment the following line to strip EXIF metadata in
# all variations (except original)
#PreParameters=-strip

############################
# default image variations
############################

[small]
Filters[]=optimize

[tiny]
Filters[]=optimize

[medium]
Filters[]=optimize

[large]
Filters[]=optimize

[rss]
Filters[]=optimize

# uncomment those 2 lines to also optimize the reference alias
# disable by default because you might want to keep the EXIF info
#[reference]
#Filters[]=optimize


###############################
# extensions image variations
###############################

# ezwebin/ezflow
[logo]
Filters[]=optimize

[listitem]
Filters[]=optimize

[articleimage]
Filters[]=optimize

[articlethumbnail]
Filters[]=optimize

[gallerythumbnail]
Filters[]=optimize

[galleryline]
Filters[]=optimize

[infoboximage]
Filters[]=optimize

# uncomment those 2 lines to also optimize the reference alias
# disable by default because you might want to keep the EXIF info
#[imagelarge]
#Filters[]=optimize

# ezmultiupload
[multiuploadthumbnail]
Filters[]=optimize


*/ ?>
