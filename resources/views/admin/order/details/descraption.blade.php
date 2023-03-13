<style>
    #moreText_{{ $dataInfo->ID }} {
      
        /* Display nothing for the element */
        display: none;
    }
</style>
@php 
    $string = strip_tags($dataInfo->DESCRIPTION);
    
    if (strlen($string) > 50) {
        $stringCut = substr($string, 0, 50);
        $endPoint = strrpos($stringCut, ' ');
        $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
    }

@endphp
<div class="editDESCRIPTION">
    
    
</div>

@php 
    $stringLength = strip_tags($dataInfo->DESCRIPTION); 
@endphp 
<span id="DESCRIPTION_{{$dataInfo->ID}}" class="text" style="width: 200px;
    display: block;">   
<p>
    <span id="first_{{ $dataInfo->ID }}">  {{ $string }}  @if (strlen($stringLength) > 50)  <span id="points"></span> @endif</span> 
      
    

    <span id="moreText_{{ $dataInfo->ID }}">  {{ $dataInfo->DESCRIPTION }}  </span>
</p>
</span>
<textarea type="text" value="" class="editbox" id="DESCRIPTION_input_{{$dataInfo->ID}}" style="display:none"> {{ $dataInfo->DESCRIPTION }}</textarea>
 
       
@if (strlen($stringLength) > 50) 
    <button onclick="toggleText{{ $dataInfo->ID }}()" id="textButton_{{ $dataInfo->ID }}">
        ....
    </button>
@endif
  


<script>
    function toggleText{{ $dataInfo->ID }}() {
      
        // Get all the elements from the page
        var points = 
            document.getElementById("points");
      
        var showMoreText =
            document.getElementById("moreText_{{ $dataInfo->ID }}");
            
        var firstText =
            document.getElementById("first_{{ $dataInfo->ID }}");
      
        var buttonText =
            document.getElementById("textButton_{{ $dataInfo->ID }}");

        if (points.style.display === "none") {

            showMoreText.style.display = "none";
            firstText.style.display    = "inline";
            points.style.display       = "inline";
            buttonText.innerHTML    = "...";
        }

        else {

            showMoreText.style.display = "inline";
            firstText.style.display     = "none";
            points.style.display       = "none";
            buttonText.innerHTML       = "Show Less";
        }
    }
</script>