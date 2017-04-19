<style scoped>
    .modal-mask {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 10000;
        background-color: rgba(0, 0, 0, 0.5);
        transition: opacity .3s ease;
        display: table;
    }


    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }

    .modal-container {
        width: 300px;
        margin: 0 auto;
        padding: 10px 30px;
        background-color: #FFF;
        border-radius: 10px;

    }

    .modal-sm {
        width: 300px;
    }

    .modal-md {
        width: 50%;
    }

    .modal-lg {
        width: 70%;
    }
    p {
        text-align: left;
    }

</style>

<template>

    <transition enter-active-class="animated tada"
                leave-active-class="animated bounceOutRight">
        <div class="modal-mask">
            <div class="modal-wrapper"  @click.self="$emit('close')">
                <div class="modal-container" :class="modalStyle">
                    <div class="modal-header">
                        <slot name="header">
                            Default header
                        </slot>

                    </div>
                    <div class="modal-body">
                        <slot name="body">
                            Default body
                        </slot>
                    </div>
                    <div class="modal-footer">
                        <slot name="footer">
                            <p>Default footer</p>
                            <button class="btn btn-primary modal-default-button" @click="$emit('close')">确定</button>
                        </slot>

                    </div>
                </div>
            </div>
        </div>
    </transition>

</template>

<script>

    export default {
        props: {
            modalStyle: {
                type: String,
                default: 'modal-sm'
            }
        }
    }

</script>