<template>
    <transition name="fade">
        <div id="modal-skew-from-top" class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">

                    <div class="modal-header">
                        <slot name="header">

                        </slot>
                    </div>

                    <div class="modal-body">
                        <slot name="body">

                        </slot>
                    </div>

                    <div class="modal-footer">
                        <slot name="footer">

                        </slot>
                        <button class="btn btn-default" @click="$emit('close')">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>


<style lang="scss" scoped>
    .modal-mask {
        position: absolute;
        z-index: 9998;
        top: 0;
        /*left: 0;*/
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: block;
        transition: opacity .3s ease;

        .modal-wrapper {
            display: block;
            vertical-align: middle;

            .modal-container {
                width: 800px;
                margin: 0px auto;
                padding: 20px 30px;
                background-color: #fff;
                border-radius: 2px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
                transition: all .3s ease;
                font-family: Helvetica, Arial, sans-serif;

                .modal-header {
                    h3 {
                        margin-top: 0;
                        color: #42b983;
                    }
                }

                .modal-body {
                    margin: 20px 0;
                }

                .modal-default-button {
                    float: right;
                }
            }
        }
    }



    .fade-enter-active, .fade-leave-active {
        transition: all 0.5s cubic-bezier(0.6, -0.28, 0.735, 0.045);
    }

    .fade-enter, .fade-leave-to {
        opacity: 0;
    }

    .fade-enter-active {
        transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }


</style>