<section class="carousel-cont w-full flex justify-center items-center">
        <div class="carousel w-[1400px] overflow-hidden relative flex justify-center items-center rounded-[20px] sm:rounded-[30px]">
            <div class="slides flex w-[1400px] [transition:transform_0.8s_ease-in-out] rounded-[30px]">
            <div class="slide flex-[0_0_100%] w-full overflow-hidden relative"><img class="w-full h-auto block" src="assets/icons/slide1.svg" /></div>
            <div class="slide flex-[0_0_100%] w-full overflow-hidden relative"><img class="w-full h-auto block" src="assets/icons/slide2.svg" /></div>
            <div class="slide flex-[0_0_100%] w-full overflow-hidden relative"><img class="w-full h-auto block" src="assets/icons/slide3.svg" /></div>
            </div>
        </div>
</section>
<script>
const slides = document.querySelector('.slides');
const totalSlides = document.querySelectorAll('.slide').length;

let index = 0;
 
setInterval(() => {
  index++;

  if (index >= totalSlides) {
    index = 0;
  }

  slides.style.transform = `translateX(-${index * 100}%)`;
}, 3000);

</script>