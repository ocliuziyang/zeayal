<style scoped>
    .upload input {
        margin-bottom: 10px;
    }
</style>
<template>
    <div class="upload">
        <input type="file" name="file" @change="upload" :accept="accept">
        <div class="progress" v-show='isLoading'>
            <div class="progress-bar" role="progressbar" data-transitiongoal="60"></div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                isLoading: false
            }
        },
        props: {

            url: {
                  type: String,
                  default: null
            },

            accept: {
                type: String,
                default: 'image/*'
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
                    // 开始 ajax 请求,需要回调显示进度条
                    self.isLoading = true

                    $('.progress .progress-bar').attr('data-transitiongoal', 60).progressbar({
                        transition_delay: 100
                    });
                    this.$emit('uploadStart')
                    $.ajax({
                        url:this.url,
                        enctype: "multipart/form-data",
                        type: 'post',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            $('.progress .progress-bar').attr('data-transitiongoal', 100).progressbar({
                                transition_delay: 100
                            })
                            setTimeout(() => {
                                self.isLoading = false
                                self.$emit('uploaded', data)
                            }, 100)

                        },
                        error: function (error) {
                            self.isLoading = false
                           self.$emit('uploadFailed', error)
                        }
                    })

                }


            }
        }
    }
</script>