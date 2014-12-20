<?php
class ImageHelper{
	private $class;
	private $src;
	private $alt;
	private $w;
	private $h;
	private $id;
	private $car_id;
	
	function __construct(){
		$this->class = 'img-thumbnail';
		$this->alt ='';
		$this->w = '240';
		$this->h ='240';
	}
	function init($src,$id,$car_id){
		$this->src = $src;
		$this->id = $id;
		$this->car_id = $car_id;
	}
	
	function process(){
		$temp =' <div align="center"><div class="form-group"> <div class="col-md-12">  ';
		$temp .='<img src="'.$this->src.'" alt="'.$this->alt.'" class="'.$this->class.'" width="'.$this->w.'" height="'.$this->h.'"> <a href="?delete=true&id='.$this->id.'&carid='.$this->car_id.'"><button type="button" class="btn btn-danger">&nbsp;&nbsp;&nbsp;ลบ&nbsp;&nbsp;</button></a></div> ';
		$temp .='</div>';
		$temp .='</div>';
		
		echo $temp;
	}
	
        function slideShow($slideName, $imgCar) {
            $temp = '<div id="' .$slideName. '" class="carousel slide col-md-10">';
            $temp .= '<ol class="carousel-indicators">';
            $i = 0;
            foreach ($imgCar as $row) {
                if ($i == 0) {
                    $temp .= '<li data-target="#' .$slideName. '" data-slide-to="' .$i. '" class="active"></li>';
                } else {
                    $temp .= '<li data-target="#' .$slideName. '" data-slide-to="' .$i. '"></li>';
                }
                $i++;
            }
            $temp .= '</ol>';

            $temp .= '<div class="carousel-inner">';
            $i = 0;
            foreach ($imgCar as $row) {
                if ($i == 0) {
                    $temp .= '<div class="item active">';
                    //$temp .= '<div class="fill" style="background-image:url(\'' .$row->path. '\');"></div>';
                    $temp .= '<img src="' .$row->path. '" />';
                    $temp .= '</div>';
                } else {
                    $temp .= '<div class="item">';
                    $temp .= '<img src="' .$row->path. '" />';
                    $temp .= '</div>';
                }
                $i++;
            }
            $temp .= '</div>';
            $temp .= '<a class="left carousel-control" href="#' .$slideName. '" data-slide="prev">';
            $temp .= '<span class="icon-prev"></span>';
            $temp .= '</a>';
            $temp .= '<a class="right carousel-control" href="#' .$slideName. '" data-slide="next">';
            $temp .= '<span class="icon-next"></span>';
            $temp .= '</a>';
            $temp .= '</div>';
            
            echo $temp;
        }
}
?>
