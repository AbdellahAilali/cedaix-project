export default function() {

    let totalPrice = function() {
        let total = 0;
        $('.matter-price-grid input:checked').each(function (element) {
            total += parseFloat($(this).data('price'));
        });

        return total;
    };

    let handleSchoolBoyCollection = function() {
        var collectionHolder = $('.school_boy_collection');

        var buttonAddSchoolBoy = $('button.add_school_boy_link');

        var newLinkDiv = $('<div></div>').append(buttonAddSchoolBoy);

        collectionHolder.append(newLinkDiv);

        $('.add_school_boy_link').on('click', function(e) {

            var index = $('.school-boy').length; // get the new index

            var newForm = collectionHolder.data('prototype');
            newForm = newForm.replace(/__name__/g, index);

            var buttonDeleteSchoolBoy = $('<button type="button" class="delete_school_boy_link btn btn-outline-primary">Enlever cet élève</button>');

            buttonDeleteSchoolBoy.on('click', function(e) {
                $(this).closest('.school-boy').remove();
            });

            var schoolByTitle = $('<h3 class="title">Elève '+(++index)+'</h3>');

            var newFormLi = $('<div class="school-boy"></div>')
                .prepend(schoolByTitle)
                .append(newForm)
                .append(buttonDeleteSchoolBoy);

            newLinkDiv.before(newFormLi);
        });
    };

    let handleFormWizard = function(){
        $.validator.addMethod("phone", function(value, element, active) {
            if (active) {
                return /^[0-9]+$/.test(value);
            }
            return true;
        }, "Vueillez entrer un numéro de téléphone valide.");

        $.validator.addMethod("postalCode", function(value, element, active) {
            if (active) {
                return /^[0-9]{5}$/.test(value);
            }
            return true;
        }, "Vueillez entrer un code postal valide.");

        $("#form-registration").validate({
            rules: {
                "registration[father][email]": {
                    email: true
                },
                "registration[father][phone]": {
                    phone: true
                },
                "registration[mother][phone]": {
                    phone: true
                },
                "registration[father][address][postalCode]": {
                    postalCode: true
                }
            },
            errorClass: "form-control-feedback",
            errorElement: "span",
            highlight: function ( element, errorClass, validClass ) {
                $(element)
                    .addClass('form-control-danger')
                    .removeClass('form-control-success')
                    .parents('.form-group')
                    .addClass('has-danger')
                    .removeClass('has-success');
            },
            unhighlight: function (element, errorClass, validClass) {
                $( element )
                    .removeClass('form-control-danger')
                    .addClass('form-control-success')
                    .parents( ".form-group" )
                    .removeClass( "has-danger" )
                    .addClass( "has-success" );
            }
        });

        $('#wizard .step').hide();
        $('#wizard .step:first').show();

        $('#wizard .btn-prev').on('click', function() {
            let step = $(this).closest('.step');
            step.fadeOut();
            step.prev().fadeIn();
        });

        $('#wizard .btn-next').on('click', function() {
            if ($("#form-registration").valid()) {
                let step = $(this).closest('.step');
                step.fadeOut();
                step.next().fadeIn();
            }
        });
    };

    $(document).ready(function() {
        $('.delete').remove();

        $('.matter-price-grid input').change(function () {
            let total = totalPrice();
            $('#total span').text(total);
        });

        handleSchoolBoyCollection();
        handleFormWizard();
    });
}
