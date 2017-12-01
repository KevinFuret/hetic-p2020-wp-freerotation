// On vérifie que le DOM est chargé
jQuery(document).ready(function() {
    hideMenu();
    mobileMenu();
    ajaxArtiste();
    filterArtiste();
    scrollToArtiste();
    serviceWorker();
    $(document).foundation();
});

function serviceWorker() {
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('https://freerotation.kevinfuret.fr/wp-content/themes/freerotation/sw.js').then(function(reg) {

            if(reg.installing) {
                console.log('Service worker installing');
            } else if(reg.waiting) {
                console.log('Service worker installed');
            } else if(reg.active) {
                console.log('Service worker active');
            }

        }).catch(function(error) {
            // registration failed
            console.log('Registration failed with ' + error);
        });
    }

}


function scrollToArtiste(e) {
    $('.liste-artistes__artiste').click(function (){
        //récuperer l'id
        $id = e.target.attr('id');
        // animer jusqu'a l'id
        $("html, body").delay(2000).animate({scrollTop: $('#'+$id).offset().top }, 2000);
    })
}

// fonction pour afficher le menu top quand on est en dessous du header
function hideMenu() {
    $(document).scroll(function() {
        // on vérifie qu'on est pas sur un mobile
        if ($('body').width() > 769){
            var y = $(this).scrollTop();
            var limit = 0;
            // sur la page d'accueil, le header est plus grand, donc on augmente la limite d'affichage du header top
            if ($('body').hasClass("home")){
                limit = 450;
            } else {
                limit = 290;
            }
            // si on est en dessous de la limite, on affiche le header, sinon on le cache au dessus de la page
            if (y > limit) {
                $('.nav').css({top:0});
            } else {
                $('.nav').css({top:-60});
            }
        }
    });
}


function closeArtiste(emplacement) {
    /*$(".close-button").on('click', function () {
        console.log( "close" );
    });*/
    emplacement.addClass("artiste-ouvert");
    emplacement.click(function() {
        emplacement.next().slideUp('slow');
        emplacement.removeClass("artiste-ouvert");
    });

}

function mobileMenu() {
    var i = 0;
    $('.nav__burger').click(function () {

        event.preventDefault();
        if (i%2==0) {
            $('.nav').addClass('menu-ouvert');
        } else {
            $('.nav').removeClass('menu-ouvert');
        }
        i++;
    })
}
function ajaxArtiste() {
        // And always use 'use strict' to make your JavaScript code mode strict.
        'use strict';
        // Wrap it with after the DOM is ready block.
        $(function (e) {
            if ($('body').hasClass('page-id-97') == true) {
                // Try not to use click() method directly.
                // Rather try to delegate the event with on() method.
                $('.artiste').on('click', function (e) {
                    e.preventDefault();
                    var postid = $(this).attr('data-post-id');
                    var emplacement = $(this);
                    // I don't know why the shorthand method had not worked for me as well
                    // But this method has worked for me.
                    if (emplacement.hasClass('artiste-ouvert') == false ){
                        $.ajax({
                            type: "POST",
                            url: my_ajax_object.ajax_url,
                            data: {
                                action: 'ajax_artiste_description',
                                postid: postid,
                            }
                        }).done(function (data) {
                            // Just simple html() method with data will show all the content.
                            emplacement.parent().addClass('artiste-open');
                            emplacement.next().children().html(data);
                            emplacement.next().slideDown('slow');
                            closeArtiste(emplacement);
                        });
                    }
                });
            }
        });
}

function filterArtiste() {
        // And always use 'use strict' to make your JavaScript code mode strict.
        'use strict';
        // Wrap it with after the DOM is ready block.
        $(function (e) {
            if ($('body').hasClass('page-id-97') == true) {
                // Try not to use click() method directly.
                // Rather try to delegate the event with on() method.
                $('.filters__unetaxo').on('click', function (e) {
                    e.preventDefault();
                    var term = $(this).attr('data-post-id');
                    console.log(term);
                    // I don't know why the shorthand method had not worked for me as well
                    // But this method has worked for me.
                        $.ajax({
                            type: "POST",
                            url: my_ajax_object.ajax_url,
                            data: {
                                action: 'ajax_filter_artiste',
                                term: term,
                            }
                        }).done(function (data) {
                            // Just simple html() method with data will show all the content.
                            var emplacement = $('.artistes');
                            emplacement.html(data);
                            emplacement.slideDown('slow');
                        });
                });
            }
        });
}

