<?php

	class imageJiggle {

		private $image;
		private $imageInfoArray;
		private $originalWidth;
		private $originalHeight;		
		private $newHeight;
		private $newWidth;

		function __construct($path) {

			ini_set("memory_limit","600M");	
			
			if (file_exists($path)) {

				if (!$imageInfo = getimagesize($path)) {

					throw new Exception('File information could not be obtained!');

				}

			} else {

				throw new Exception('File does not exist!');

			}

			$error = false;

			switch($imageInfo['mime']) {

				case "image/jpeg":

					if (!($this->image = imagecreatefromjpeg($path))) {

						$error = true;

					}

					break;

			}

			if ($error) {

				throw new Exception('Could not create image from file!');

			}

			$this->imageInfoArray = $imageInfo;
			$this->newWidth = $imageInfo[0];
			$this->newHeight = $imageInfo[1];
			$this->originalWidth = $imageInfo[0];
			$this->originalHeight = $imageInfo[1];

		}

		function calcResize() {

			$heightRatio = $this->newHeight / $this->originalHeight;
			$widthRatio = $this->newWidth / $this->originalWidth;

			$scale = min($heightRatio,$widthRatio);

			$this->newHeight = ceil($scale*$this->originalHeight);
			$this->newWidth = ceil($scale*$this->originalWidth);

		}

		function write($path, $filename, $quality) {

			$this->calcResize();
			
			if (!($newImage = imageCreateTrueColor($this->newWidth, $this->newHeight))) {

				throw new Exception('Could not create canvas!');

			}

			if (!(imageCopyResampled($newImage, $this->image, 0, 0, 0, 0, $this->newWidth, $this->newHeight, $this->originalWidth, $this->originalHeight))) {

					throw new Exception('Could not copy resampled image!');

			}	

			if (!(imageJPEG($newImage, $path."/".$filename.".jpg", $quality))) {

				throw new Exception('Could not create and write new image!');

			}

			imageDestroy($newImage);

		}

		function setDimensions($width,$height) {

			if (is_numeric($width) && is_numeric($height)) {

				$this->newWidth = $width;
				$this->newHeight = $height;

			} else {

				throw new Exception('Both dimensions must be numeric!');

			}

		}

	}

?>
