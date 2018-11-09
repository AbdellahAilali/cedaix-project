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

        // count the current form inputs we have (e.g. 2), use that as the new
        // index when inserting a new item (e.g. 2)
        collectionHolder.data('index', collectionHolder.find(':input[name*="lastName"]').length);

        var buttonAddSchoolBoy = $('<button type="button" class="add_school_boy_link">Ajouter un élève</button>');
        var newLinkDiv = $('<div></div>').append(buttonAddSchoolBoy);

        collectionHolder.append(newLinkDiv);

        $('.school_boy_collection button.add_school_boy_link').on('click', function(e) {
            // get the new index
            var index = collectionHolder.data('index');

            var newForm = collectionHolder.data('prototype');
            // You need this only if you didn't set 'label' => false in your tags field in TaskType
            // Replace '__name__label__' in the prototype's HTML to
            // instead be a number based on how many items we have
            // newForm = newForm.replace(/__name__label__/g, index);

            // Replace '__name__' in the prototype's HTML to
            // instead be a number based on how many items we have
            newForm = newForm.replace(/__name__/g, index);

            // increase the index with one for the next item
            collectionHolder.data('index', index + 1);

            // Display the form in the page in an li, before the "Add a tag" link li
            var newFormLi = $('<div></div>').append(newForm);
            newLinkDiv.before(newFormLi);
        });

        let validator = $("#form-registration").validate();

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
