$('.carousel.carousel-multi-item.v-2 .carousel-item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));

  for (var i=0;i<4;i++) {
    next=next.next();
    if (!next.length) {
      next=$(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
  }
});
// js get slug
    const name = document.querySelector ('#name');
    const slug = document.querySelector ('#slug');

    name.addEventListener('change', function () {
        fetch ('/dashboard/products/checkslug?name=' + name.value)
        .then(response => response.json())
        .then(data=>slug.value = data.slug)
    })

// js preview image
    image.onchange = evt => {
        const [file] = image.files
        if (file) {
            img.src = URL.createObjectURL(file)
        }
    }