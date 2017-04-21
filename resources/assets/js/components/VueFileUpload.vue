<template>
    <input type="file" name="file" @change="upload">
</template>

<script>
    export default {
        props: {
          url: {
              type: String,
              default: null
          }
        },
        methods: {
            upload () {
                var myfiles = window.document.getElementsByName('file')[0].files
                if (myfiles.length > 0) {
                    var formData = new FormData()
                    formData.append('thumbnail', myfiles[0])
                    formData.append('_token', window.Laravel.csrfToken)

                    let self = this
                    $.ajax({
                        url:this.url,
                        enctype: "multipart/form-data",
                        type: 'post',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            console.log(data)
                            self.$emit('uploaded', data)
                        }
                    })

                }


            }
        }
    }
</script>