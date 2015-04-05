

$('#tag_list').select2({
    placeholder: 'Choose a tag',
    tags: true,
    ajax: {
        dataType: 'json',
        url: 'api/v1/getTags',
        type: 'GET',
        delay: 250,
        data: function(params) {
            return {
                q: params.term
            }
        },
        processResults: function(data){
            return { results: data
            };
        },
        cache: true
    }
});