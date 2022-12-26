<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="icon" href="assets/images/items/1.jpg" type="image/x-icon" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{URL::to('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{URL::to('assets/css/all.min.css')}}">
    <link href="{{URL::to('assets/css/responsive.css')}}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script>
    <link href="{{URL::to('assets/css/ui.css')}}" rel="stylesheet">
    <script src="{{URL::to('assets/js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('assets/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>

</head>
<style>
    .example-parent {
    border: 2px solid #DFA612;
    color: black;
    display: flex;
    font-family: sans-serif;
    font-weight: bold;
  }
  
  .example-origin {
    flex-basis: 100%;
    flex-grow: 1;
    padding: 10px;
  }
  
  .example-draggable {
    background-color: #4AAE9B;
    font-weight: normal;
    margin-bottom: 10px;
    margin-top: 10px;
    padding: 10px;
    
   
  }
  
  .example-dropzone {
    /* background-color: #6DB65B; */
    flex-basis: 100%;
    flex-grow: 1;
    padding: 10px;
    border:1px solid #eeeeee;
  }

  img{
    width: 100%;
    height: inherit;
    overflow: auto;
    max-height: 300px;
   
  }
  .img-size{
    height:100px;
  }
  #gg{
    overflow: auto;
  }

  #draggable-1{
    overflow: auto;
  }
    .flex-item {
        border: 1px solid #eeeeee;
        width: 100%;
    }


    .sticker{
        display: flex;
    flex-direction: column;
    width: 33%;
    row-gap:20px;
    padding: 15px;
    margin-right: 80px;
    }
    #section-container {
        display: flex;
        /* border: 1px solid; */
        justify-content: space-between;
    }

    .ig{
        height: 50px;
    }

    #container-box{
        display: block;
    /* border: 9px solid red; */
    margin: 1% 10%;
    }
</style>

<body>

    <header class="section-header">

        <nav class="navbar navbar-dark navbar-expand p-0 bg-primary">
            <div class="container">
                <ul class="navbar-nav d-none d-md-flex mr-auto">
                    <li class="nav-item"><a class="nav-link" href="{{route('user/home')}}">Home</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#">Delivery</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Payment</a></li> -->
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> English </a>
                        <ul class="dropdown-menu dropdown-menu-right" style="max-width: 100px;">
                            <li><a class="dropdown-item" href="#">Arabic</a></li>
                            <li><a class="dropdown-item" href="#">Russian </a></li>
                        </ul>
                    </li>
                </ul> <!-- list-inline //  -->

            </div> <!-- container //  -->
        </nav> <!-- header-top-light.// -->

        <section class="header-main border-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-6">
                        <a href="#" class="brand-wrap">
                            ShareWare Nepal
                        </a> <!-- brand-wrap.// -->
                    </div>
                    <div class="col-lg-6 col-12 col-sm-12">
                        <form action="#" class="search">
                            <div class="input-group w-100">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <!-- <i class="fa fa-search"></i> -->
                                        search
                                    </button>
                                </div>
                            </div>
                        </form> <!-- search-wrap .end// -->
                    </div> <!-- col.// -->
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="widgets-wrap float-md-right">
                            
                            <div class="widget-header icontext">
                                
                                <div class="text">
                                  
                                    <div>
                                        <a href="route{{'login'}}">Sign in</a> |
                                        <a href="#"> Register</a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- widgets-wrap.// -->
                    </div> <!-- col.// -->
                </div> <!-- row.// -->
            </div> <!-- container.// -->
        </section> <!-- header-main .// -->



        <nav class="navbar navbar-main navbar-expand-lg navbar-light border-bottom">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="main_nav">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link pl-0" data-toggle="dropdown" href="#"><strong> <i class="fa fa-bars"></i> All category</strong></a>
                            <div class="dropdown-menu" >
                                 @foreach($category as $cat)
                                <a class="dropdown-item">{{$cat}}</a>

                                @endforeach 
                               
                            </div>
                    
                      
                        
                    </ul>
                    @foreach($category as $cat)
          <ul>
            <a class="dropdown-item" href="{{ route('product.category', $cat) }}">{{$cat}}</a>
            </ul>
            @endforeach
                </div> <!-- collapse .// -->
            </div> <!-- container .// -->
        </nav>

        
    </header> <!-- section-header.// -->
    

    <div id="container-box">
    <div id="section-container">
        <div class="flex-item sticker" >
                  @foreach($sticker as $stk)
                <img class="img-size" src="{{URL::to('storage/images/'.$stk->product_image)}}" alt="" id="{{$loop->index}}" draggable="true" ondragstart="onDragStart(event);">
             @endforeach
             
        </div>
        <div  class="example-dropzone" ondragover="onDragOver(event)"ondrop="onDrop(event)">
         <img src="{{URL::to('storage/images/'.$product[0]->product_image)}}" > 
        </div>
      </div>
      <div style="display:flex;justify-content:center; margin-top:3rem">
      <button class="btn btn-primary" style="width:30rem;">Save</button>
      </div>
    </div>
        <!-- <div id="img-i"></div> -->

</body>
<script>



// var draggableElement;
// var dropzone =document.getElementById('drop-zone')


function onDragStart(event) {
  console.log(event)
    event
      .dataTransfer
      .setData('text/plain', event.target.id);
  }
function onDragOver(event) {
    event.preventDefault();
  }

  function onDrop(event) {
    console.log(event)
    const id = event
      .dataTransfer
      .getData('text');
      var draggableElement = document.getElementById(id)
      var dropzone = event.target;
      dropzone.appendChild(draggableElement);
      draggableElement.classList.add("resize-drag")
  }
 

  function myFunction() {
    document.getElementById("draggable-1").style.resize = "both";
  }



  /* The dragging code for '.draggable' from the demo above
 * applies to this demo as well so it doesn't have to be repeated. */
// enable draggables to be dropped into this
function dragMoveListener (event) {
  var target = event.target
  // keep the dragged position in the data-x/data-y attributes
  var x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx
  var y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy

  // translate the element
  target.style.transform = 'translate(' + x + 'px, ' + y + 'px)'

  // update the posiion attributes
  target.setAttribute('data-x', x)
  target.setAttribute('data-y', y)
}

// this function is used later in the resizing and gesture demos
window.dragMoveListener = dragMoveListener
interact('.dropzone').dropzone({
  // only accept elements matching this CSS selector
  accept: '#yes-drop',
  // Require a 75% element overlap for a drop to be possible
  overlap: 0.75,

  // listen for drop related events:

  ondropactivate: function (event) {
    // add active dropzone feedback
    event.target.classList.add('drop-active')
  },
  ondragenter: function (event) {
    var draggableElement = event.relatedTarget
    var dropzoneElement = event.target

    // feedback the possibility of a drop
    dropzoneElement.classList.add('drop-target')
    draggableElement.classList.add('can-drop')
    draggableElement.textContent = 'Dragged in'
  },
  ondragleave: function (event) {
    // remove the drop feedback style
    event.target.classList.remove('drop-target')
    event.relatedTarget.classList.remove('can-drop')
    event.relatedTarget.textContent = 'Dragged out'
  },
  ondrop: function (event) {
    event.relatedTarget.textContent = 'Dropped'
  },
  ondropdeactivate: function (event) {
    // remove active dropzone feedback
    event.target.classList.remove('drop-active')
    event.target.classList.remove('drop-target')
  }
})

interact('.drag-drop')
  .draggable({
    inertia: true,
    modifiers: [
      interact.modifiers.restrictRect({
        restriction: 'parent',
        endOnly: true
      })
    ],
    autoScroll: true,
    // dragMoveListener from the dragging demo above
    listeners: { move: dragMoveListener }
  })



  interact('.resize-drag')
  .resizable({
    // resize from all edges and corners
    edges: { left: true, right: true, bottom: true, top: true },

    listeners: {
      move (event) {
        var target = event.target
        var x = (parseFloat(target.getAttribute('data-x')) || 0)
        var y = (parseFloat(target.getAttribute('data-y')) || 0)

        // update the element's style
        target.style.width = event.rect.width + 'px'
        target.style.height = event.rect.height + 'px'

        // translate when resizing from top or left edges
        x += event.deltaRect.left
        y += event.deltaRect.top

        target.style.transform = 'translate(' + x + 'px,' + y + 'px)'

        target.setAttribute('data-x', x)
        target.setAttribute('data-y', y)
        target.textContent = Math.round(event.rect.width) + '\u00D7' + Math.round(event.rect.height)
      }
    },
    modifiers: [
      // keep the edges inside the parent
      interact.modifiers.restrictEdges({
        outer: 'parent'
      }),

      // minimum size
      interact.modifiers.restrictSize({
        min: { width: 100, height: 50 }
      })
    ],

    inertia: true
  })
  .draggable({
    listeners: { move: window.dragMoveListener },
    inertia: true,
    modifiers: [
      interact.modifiers.restrictRect({
        restriction: 'parent',
        endOnly: true
      })
    ]
  })







  

function chek(category){
  console.log(category)
  let prntNode = document.getElementById("img-i")
  var first = prntNode.firstElementChild;
        while (first) {
            first.remove();
            first = prntNode.firstElementChild;
        }
   var page_data = {{ Js::from($sticker) }};
  let gg =  page_data.filter((ele)=>{
       return ele.category == category
    })
    console.log(gg)
    for(key in gg){
      console.log(key)
    var a = document.createElement('img')
    a.src = "{{URL::to('storage/images/'.$stk->product_image)}}"
    a.id = key
    a.className = "img-size"
    a.draggable="true"
    // a.ondragstart="onDragStart(event);"
    a.addEventListener("ondragstart",onDragStart(event))
    let parent = document.getElementById('img-i')
    parent.appendChild(a)
    
    }
}



// let gg =  page_data.filter((ele)=>{
//         console.log(ele.category)
//        return ele.category == 'cartoon'
//     }
    
//     )

// gg.foreach((ele,i)=>{
//     var a = document.createElement('img')
//     a.src = "{{URL::to('storage/images/'.$stk->product_image)}}"
//     a.id = i
//     a.draggable="true"
//     a.ondragstart="onDragStart(event);"


// })


</script>
</html>