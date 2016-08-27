<?php
	class Image{
		private $image;
		private $info;
		public function __construct($src){  //���캯������ͼƬ�����ڴ渴��ͼƬ
			$info = getimagesize($src);
			$this->info = array(
				'width'=>$info[1];
				'height'=>$info[1];
				'type'=>image_type_to_extension(info[2],false);
				'mime'=>$info['mime']
			);		
			fun = "imagecreatefrom{$this->info['type']}";
			$image = $fun($src);
		}

		public function thumb($width,$height) {  //ѹ��
			$image_thumb = imagecreatetruecolor($width,$height);
			imagecopyresampled($image_thumb,$this->image,0,0,0,0,$width,$height,$this->info['width'],$this->info['height']);
			imagedestroy($this->image);
			$this->image = $image_thumb;
		}

		public function fontMark($content,$font_url,$size,$color,$local,$angle) {  //�������ˮӡ
			$col = imagecolorallocatealpha($this->image,$color[0],$color[1],$color[2],$color[3],);
			imagettftext($this->image,$size,$angle,$local['x'],$local['y'],$col,$font_url,$content);
		}

		public function imageMark($source,$local,$alpha){  //���ͼƬˮӡ
			$info2 = getimagesize($source);
			$type2 = image_type_to_extension($info[2],false);
			$fun2 = "imagecreatefrom{$type2}";
			$water = $fun2($source);
			imagecopymerge($this->image,$water,$local['x'],local['y'],0,0,$info2[2],$info2[1],$alpha);
			imagedestroy($water);
		}

		public function show() { //����������
			header("Content-type:".$this->info['mime']);
			$funs = "image{$this->info['type']}";
			$funs($this->image);
		}

		public function save($newname) {  //���浽����
			$funs = "image{$this->info['type']}";
			$funs($this->image,$newname.".".$this->info['type']);
		}

		public function __destroy() {  //��������������ͼƬ
			imagedestroy($this->image);
		}

	}



?>