// registereren pagina - minimaal 1 checkbox moet gecheked zijn
function deRequire(elClass) {
            el=document.getElementsByClassName(elClass);

            var atLeastOneChecked=false;
            for (i=0; i<el.length; i++) {
                if (el[i].checked === true) {
                    atLeastOneChecked=true;
                }
            }

            if (atLeastOneChecked === true) {
                for (i=0; i<el.length; i++) {
                    el[i].required = false;
                }
            } else {
                for (i=0; i<el.length; i++) {
                    el[i].required = true;
                }
            }
        }

       function deRequireCb(elClass) {
            el=document.getElementsByClassName(elClass);

            var atLeastOneChecked=false;//at least one cb is checked
            for (i=0; i<el.length; i++) {
                if (el[i].checked === true) {
                    atLeastOneChecked=true;
                }
            }

            if (atLeastOneChecked === true) {
                for (i=0; i<el.length; i++) {
                    el[i].required = false;
                }
            } else {
                for (i=0; i<el.length; i++) {
                    el[i].required = true;
                }
            }
        }

var verifyPaymentType = function () {
  var checkboxes = $('.wish_payment_type .checkbox');
  var inputs = checkboxes.find('input');
  var first = inputs.first()[0];

  inputs.on('change', function () {
    this.setCustomValidity('');
  });

  first.setCustomValidity(checkboxes.find('input:checked').length === 0 ? 'Choose one' : '');
}

$('#submit').click(verifyPaymentType);

$('form').on('submit', function(){alert('ok')})

// mijn account pagina 
.bg-white {
    background-color: #fff;
    -webkit-box-shadow: 0px 0px 5px 0px rgba(221, 221, 221, 1);
    -moz-box-shadow: 0px 0px 5px 0px rgba(221, 221, 221, 1);
    box-shadow: 0px 0px 5px 0px rgba(221, 221, 221, 1);
}
.pinside40 {
    padding: 40px;
}
.pinside30 {
    padding: 30px;
}
.mb30 {
    margin-bottom: 30px;
}
form {
    display: block;
    margin-top: 0em;
}
.form-title {
    border-bottom: 1px solid #e8e6df;
    padding-bottom: 19px;
    margin-bottom: 30px;
}
h2 {
    font-size: 22px;
}
input.form-control {
    height: 48px;
    background-color: #fdfdfb;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    border: 1px solid #e9e6e0;
    -webkit-box-shadow: inset 0 0px 0px rgba(0, 0, 0, .075);
    box-shadow: inset 0 0px 0px rgba(0, 0, 0, .075);
    font-family: 'Montserrat', sans-serif;
}


button.btn-primary {
    height: 48px;
}

.btn-primary {
    background-color: #f48f00;
    color: #fff;
}
.btn {
    padding: 10px 20px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    border: transparent;
    border-radius: 2px;
    text-transform: uppercase;
    font-weight: 800;
    font-family: 'Montserrat', sans-serif;
    letter-spacing: 1px;
}