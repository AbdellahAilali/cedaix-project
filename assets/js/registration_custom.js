export default function() {

    let totalPrice = function() {
        let total = 0;
        $('.matter-price-grid input:checked').each(function (element) {
            total += parseFloat($(this).data('price'));
        });

        return total;
    };

    $(document).ready(function() {
        $('.delete').remove();

        $('.matter-price-grid input').change(function () {
            let total = totalPrice();
            $('#total span').text(total);
        });

        var collectionHolder = $('.school_boy_collection');

        var buttonAddSchoolBoy = $('button.add_school_boy_link');

        var newLinkDiv = $('<div></div>').append(buttonAddSchoolBoy);

        collectionHolder.append(newLinkDiv);

        $('.school_boy_collection button.add_school_boy_link').on('click', function(e) {
            // get the new index
            var index = $('.school-boy').length;

            var newForm = collectionHolder.data('prototype');
            // You need this only if you didn't set 'label' => false in your tags field in TaskType
            // Replace '__name__label__' in the prototype's HTML to
            // instead be a number based on how many items we have
            // newForm = newForm.replace(/__name__label__/g, index);

            // Replace '__name__' in the prototype's HTML to
            // instead be a number based on how many items we have
            newForm = newForm.replace(/__name__/g, index);

            var buttonDeleteSchoolBoy = $('<button type="button" class="delete_school_boy_link btn btn-outline-primary">Enlever cet élève</button>');

            buttonDeleteSchoolBoy.on('click', function(e) {
                $(this).closest('.school-boy').remove();
            });

            // Display the form in the page in an li, before the "Add a tag" link li
            var schoolByTitle = $('<h3 class="title">Elève '+(++index)+'</h3>');

            var newFormLi = $('<div class="school-boy"></div>')
                .prepend(schoolByTitle)
                .append(newForm)
                .append(buttonDeleteSchoolBoy);

            newLinkDiv.before(newFormLi);
        });

        $("#form-registration").validate({
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

        $('#wizard .step').fadeOut('slow');
        $('#wizard .step:first').fadeIn();

        $('#wizard .btn-next').on('click', function() {
            let valid = $("#form-registration").valid();

            if (valid) {
                let parent = $(this).parent();
                parent.fadeOut('slow');
                parent.next().fadeIn('slow');
            }
        });
    })
}
