@php 
    $string = strip_tags($dataInfo->DESCRIPTION);
    
    if (strlen($string) > 50) {
        $stringCut = substr($string, 0, 50);
        $endPoint = strrpos($stringCut, ' ');
        $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
    }

@endphp
@php 
    $stringLength = strip_tags($dataInfo->DESCRIPTION); 
@endphp 

    <span id="first_{{ $dataInfo->ID }}">  {{ $string }}  @if (strlen($stringLength) > 50)  <span id="points"></span> @endif</span> 
    <span id="moreText_{{ $dataInfo->ID }}">  {{ $dataInfo->DESCRIPTION }}  </span>
