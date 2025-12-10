<!doctype html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gợi ý món ăn</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: system-ui, -apple-system, 'Segoe UI', Roboto, Arial;
    }

    .hero {
      min-height: 60vh;
      display: flex;
      align-items: center
    }

    .brand {
      font-weight: 700
    }

    footer {
      padding: 2rem 0;
      background: #f8f9fa
    }

    .card-container {
    border: 2px solid #ddd; 
    border-radius: 15px;    
    padding: 15px;          
    background-color: #f8f9fa; 
}

    .selectable-card {
    border: 2px solid #ddd;
    border-radius: 10px;
    cursor: pointer;
    background-color: #fff;
    transition: 0.2s;
}

.selectable-card.selected {
    border-color: #28a745 !important;
    background-color: #e9fbe9 !important;
}

.selectable-card input[type="checkbox"] {
    display: none;
}
  </style>
</head>

<body>

  <!--Header-->
  <div>
    @include('layouts.header')
  </div>


<!--Content--> 
 <div>@yield('content')</div>
    

  
  <!--Footer-->
  <div>
    @include('layouts.footer')
  </div>

  <script>
document.querySelectorAll('.selectable-card').forEach(card => {
    card.addEventListener('click', (e) => {

        // Khi nhấn vào checkbox thì không trigger lên card
        if (e.target.type === "checkbox") {
            e.stopPropagation();
            return;
        }

        // Không đổi màu khi bấm vào các nút khác
        if (e.target.tagName === "A" || e.target.tagName === "BUTTON" || e.target.closest("form button")) {
            return;
        }

        // Toggle màu card
        card.classList.toggle('selected');

        let checkbox = card.querySelector('input[type="checkbox"]');
        checkbox.checked = !checkbox.checked;
    });
});
</script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
</body>

</html>