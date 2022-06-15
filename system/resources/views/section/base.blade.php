 <!DOCTYPE html>
 <html lang="en" itemscope itemtype="http://schema.org/WebPage">
 <head>
  @include('section.assets')


  <style> 
        h1{ 
        color: #1BC4CA; 
        margin-top:30px; 
        }                 
        .dark .card{ 
            background-color: #222; 
            color: #e6e6e6; 
        } 
         .dark .gelap{ 
            background-color: #4D4949; 
            color: #e6e6e6; 
        } 

        .theme-switch-wrapper {
            display: flex;
            align-items: center;  
            float: right;                      
        }        
        .theme-switch {
        display: inline-block;
        height: 25px;
        position: relative;
        width: 60px;
        text-align: right;
        }
        .theme-switch input {
        display:none;
        }
        .slider {
        background-color: #ccc;
        bottom: 0;
        cursor: pointer;
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
        transition: .4s;
        }
        .slider:before {
        background-color: #fff;
        bottom: 4px;
        content: "";
        height: 20px;
        left: 4px;
        position: absolute;
        transition: .4s;
        width: 20px;

        }
        input:checked + .slider {
        background-color: #66bb6a;
        }
        input:checked + .slider:before {
        transform: translateX(26px);
        }
        .slider.round {
        border-radius: 34px;
        }
        .slider.round:before {
        border-radius: 50%;
        }
    </style> 
</head>

<body class="index-page bg-gray-200 animated fadeIn">



  <!-- Navbar -->
  <div class="container-fluid position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
    @include('section.navbar')
      </div>
    </div>
  </div>


  @yield('content')
  @include('section.footer')
  @include('section.js')

</body>
</html>
