<style>
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
        padding: 20px 30px;
        background-color: #FFF;

    }

    p {
        text-align: left;
    }

</style>

<template>

    <transition enter-active-class="animated bounceInLeft"
                leave-active-class="animated bounceOutRight">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">
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
                            <button class="btn btn-primary modal-default-button" @click="$emit('submit')">确定</button>
                        </slot>

                    </div>
                </div>
            </div>
        </div>
    </transition>

</template>

<script>

    export default {

    }

</script>