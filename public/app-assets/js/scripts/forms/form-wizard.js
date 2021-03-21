/*=========================================================================================
    File Name: wizard-steps.js
    Description: wizard steps page specific js
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
  'use strict';

  var bsStepper = document.querySelectorAll('.bs-stepper'),
    modernWizard = document.querySelector('.modern-wizard-example');

  // Adds crossed class
  if (typeof bsStepper !== undefined && bsStepper !== null) {
    for (var el = 0; el < bsStepper.length; ++el) {
      bsStepper[el].addEventListener('show.bs-stepper', function (event) {
        var index = event.detail.indexStep;
        var numberOfSteps = $(event.target).find('.step').length - 1;
        var line = $(event.target).find('.step');

        // The first for loop is for increasing the steps,
        // the second is for turning them off when going back
        // and the third with the if statement because the last line
        // can't seem to turn off when I press the first item. ¯\_(ツ)_/¯

        for (var i = 0; i < index; i++) {
          line[i].classList.add('crossed');

          for (var j = index; j < numberOfSteps; j++) {
            line[j].classList.remove('crossed');
          }
        }
        if (event.detail.to == 0) {
          for (var k = index; k < numberOfSteps; k++) {
            line[k].classList.remove('crossed');
          }
          line[0].classList.remove('crossed');
        }
      });
    }
  }

  // Modern Wizard
  // --------------------------------------------------------------------
  if (typeof modernWizard !== undefined && modernWizard !== null) {
    var modernStepper = new Stepper(modernWizard, {
      linear: false
    });
    $(modernWizard)
      .find('.btn-next')
      .on('click', function () {
        modernStepper.next();
        $(this).css('display', 'none');
        $('.btn-prev').removeAttr('style');
        $('html,body').animate({scrollTop: 0}, 600);
      });
    $(modernWizard)
      .find('.btn-prev')
      .on('click', function () {
        modernStepper.previous();
        $(this).css('display', 'none');
        $('.btn-next').removeAttr('style');
        $('html,body').animate({scrollTop: 0}, 600);
      });
  }

  $('.step').click(function() {
    if ($(this).attr('data-target') == '#design') {
      $('.btn-next').removeAttr('style');
      $('.btn-prev').css('display', 'none');
    } else {
      $('.btn-next').css('display', 'none');
      $('.btn-prev').removeAttr('style');
    }
  });

});
