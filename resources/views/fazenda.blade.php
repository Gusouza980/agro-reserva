@extends('template.main')

@section("styles")
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
@endsection

@section('conteudo')
    
    @if($view == "desktop")
        @livewire('fazenda.institucional.pagina', ["fazenda" => $fazenda, "reserva" => $reserva])
    @else
        @livewire('fazenda.institucional.pagina-mobile', ["fazenda" => $fazenda, "reserva" => $reserva])
    @endif
@endsection

@section('scripts')
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src=" https://ajax.googleapis.com/ajax/libs/jqueryui/1.5.2/jquery-ui.min.js"></script>
<script>
    var section = 0;

    
    function redirect(location){
        window.location = location;
        return;
    }

    function troca_avaliacao(element, num){
        $(element).addClass("active");
        $(element).siblings().removeClass("active");
        //element.addClass('active');
        console.log($(element).parents());
        var cont = 0;
        $(".conteudo-avaliacao").each(function(){
            if(cont == num){
                $(this).css("display", "block");
            }else{
                $(this).css("display", "none");
            }
            cont++;
        })
    }

    $(document).ready(function(){
        // $('html, body').animate({scrollTop: $("#pagina-atual").offset().top}, 1500);
        // $(".link-avaliacao-section2-fazenda").click(function(){
        //     $(this).siblings().removeClass("active");            
        //     $(this).addClass("active");
        //     var novo = $(this).attr("num");
        //     $(".conteudo-avaliacao[num="+section+"]").hide(0, function(){
        //         $(".conteudo-avaliacao[num="+novo+"]").show(0);
        //     });
        //     section = novo;
        // })

        var slide1 = 1;

            $(".slick").slick({

                // normal options...
                slidesToShow: 6,
                infinite: true,
                dots: true,
                adaptiveHeight: true,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 2000,
                // the magic
                responsive: [{
              
                    breakpoint: 1024,
                    settings: {
                      slidesToShow: 4,
                      infinite: true,
                      dots: true,
                      adaptiveHeight: true,
                      arrows: false,
                    }
              
                  }, {
              
                    breakpoint: 650,
                    settings: {
                      slidesToShow: 3,
                      infinite: true,
                      dots: true,
                      adaptiveHeight: true,
                      arrows: false,
                    }
              
                  }, {
              
                    breakpoint: 750,
                    settings: {
                      slidesToShow: 3,
                      infinite: true,
                      dots: true,
                      adaptiveHeight: true,
                      arrows: false,
                    }
              
                  }, {
              
                    breakpoint: 550,
                    settings: {
                      slidesToShow: 2,
                      infinite: true,
                      dots: true,
                      adaptiveHeight: true,
                      arrows: false,
                    }
              
                  },{
              
                    breakpoint: 360,
                    settings: {
                      slidesToShow: 1,
                      infinite: true,
                      adaptiveHeight: true,
                      arrows: false,
                    }
              
                  }]
            });
    });
</script>
    
@endsection