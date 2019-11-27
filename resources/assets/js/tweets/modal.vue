<template>
    <div>
        <modal v-show="showModal" @close="showModal = false" @open="showModal = true">
            <!--
              you can use custom content here to overwrite
              default content
            -->
            <h3 v-if="edit_id === '' " slot="header">
                Create Tweet
            </h3>
            <h3 v-else slot="header">
                Update Tweet
            </h3>

            <div slot="body">
                <form method="post" @submit.prevent="validateBeforeSubmit">

                    <div :class="{'form-group': true, 'has-error': errors.title.length > 0}">
                        <label class="control-label" for="title">Title (*)</label>
                        <input type="text" id="title"
                               :class="['form-control']"
                               name="title"
                               v-model.trim="form.title"
                               @change="checkValidation"
                               placeholder="Enter Title">
                        <span v-if="errors.title.length > 0"
                              class="help-block">{{ errors.title[0] }}</span>

                    </div>

                    <div :class="{'form-group': true, 'has-error': errors.image.length > 0}">
                        <label class="control-label" for="image">Image Url (Optional)</label>
                        <input type="text" id="image"
                               :class="['form-control']"
                               v-model.lazy="form.image"
                               name="image"
                               @change="checkValidation"
                               placeholder="Enter image url">
                        <span v-if="errors.image.length > 0"
                              class="help-block">{{ errors.image[0] }}</span>

                        <img v-if="form.image !== '' && errors.image.length === 0" :src=" form.image" alt=""
                             class="img-responsive img-thumbnail"
                             width="200">

                    </div>

                    <div :class="{'form-group':true, 'has-error': errors.description.length > 0}">
                        <label class="control-label" for="description">Description (*)</label>
                        <textarea type="text" id="description"
                                  :class="['form-control']"
                                  v-model.trim="form.description"
                                  @change="checkValidation"
                                  name="description"
                                  placeholder="Enter Description"></textarea>
                        <span v-if="errors.description.length > 0"
                              class="help-block">{{ errors.description[0] }}</span>

                    </div>


                    <button type="submit" class="btn btn-default btn-custom">
                        Submit
                    </button>
                </form>
            </div>

            <div slot="footer">

            </div>
            <vue-toastr ref="mytoast"></vue-toastr>
        </modal>
    </div>
</template>


<script type="text/babel">
    import modal from '../components/modal'
    import VueToastr from "vue-toastr";

    export default {
        components: {
            modal, VueToastr
        },
        mounted() {
            var _this = this;
            _this.$eventHub.$on('OpenModal', (param, data = false) => {
                if (param === 'create') {
                    _this.form = {
                        title: '',
                        description: '',
                        image: '',
                    };
                    _this.edit_id = '';
                } else {
                    _this.form = {
                        title: data.title,
                        description: data.description,
                        image: data.image
                    };
                    _this.edit_id = data.id;
                    _this.index = param;
                }
                _this.showModal = true;
                window.scrollTo(0, 0);
            });
        },
        data() {
            return {
                baseUrl: baseUrl,
                showModal: false,
                form: {
                    title: '',
                    description: '',
                    image: ''
                },
                errors: {
                    title: [],
                    description: [],
                    image: [],
                },
                edit_id: '',
                index: '',
                validation_errors: []
            }
        },

        methods: {
            checkValidation() {
                this.errors = {
                    title: [],
                    description: [],
                    image: [],
                };
                if (this.form.title === '') {
                    this.errors.title.push('Title is required');
                } else if (this.form.title.length < 15) {
                    this.errors.title.push('Title should have minimum 15 character');
                } else {
                    this.errors.title = []
                }
                if (this.form.description === '') {
                    this.errors.description.push('Description is required');
                } else if (this.form.description.length < 20) {
                    this.errors.description.push('Description should have minimum 20 character');
                } else if (this.form.description.length > 500) {
                    this.errors.description.push('Description can not have more than 500 characters');
                } else {
                    this.errors.description = []
                }

                if (this.form.image !== '') {
                    let result = this.isURL(this.form.image);
                    if (!result) {
                        this.errors.image.push('Image Url is not valid');
                    } else {
                        this.errors.image = []
                    }
                } else {
                    this.errors.image = []
                }

                if (this.errors.title.length === 0 && this.errors.description.length === 0 && this.errors.image.length === 0) {
                    return true;
                } else {
                    return false;
                }
            },

            validateBeforeSubmit() {
                const validate = this.checkValidation()
                if (!validate) {
                    return false;
                }
                if (parseInt(this.edit_id)) {
                    this.updateData();
                } else {
                    this.saveData();
                }

            },

            isURL(str) {
                let url = /^(?:\w+:)?\/\/([^\s\.]+\.\S{2}|localhost[\:?\d]*)\S*$/.test(str);
                if (url) {
                    var image = new Image();
                    image.src = str;
                    if (!image.complete) {
                        return false;
                    } else if (image.height === 0) {
                        return false;
                    } else {
                        return true;
                    }
                } else {
                    return false;
                }
            },

            saveData() {
                var _this = this;
                let url = _this.baseUrl + '/api/account/save-tweet';
                axios.post(url, _this.form)
                    .then((response) => {
                            _this.$toastr.s('SUCCESS', 'Tweet Saved Successfully!')
                            _this.showModal = false;
                            _this.$eventHub.$emit('data-created', response.data);
                        }
                    ).catch(error => {
                    if (error.response) {
                        console.log(error.response.data);
                        console.log(error.response.status);
                        console.log(error.response.headers);
                        if (error.response.status === 422) {
                            _this.errors.title = error.response.data.title
                        }
                    } else if (error.request) {
                        console.log(error.request);
                    } else {
                        console.log('Error', error.message);
                    }
                    console.log(error.config);
                });
            }
            ,

            updateData() {
                var _this = this;
                axios.patch(this.baseUrl + '/api/account/update-tweet' + '/' + _this.edit_id, this.form)
                    .then((response) => {
                            _this.$toastr.s('SUCCESS MESSAGE', 'Tweet Saved Successfully!')
                            _this.showModal = false;
                            _this.$eventHub.$emit('data-updated', response.data, _this.index);
                        }
                    ).catch(error => {
                    if (error.response) {
                        console.log(error.response.data);
                        console.log(error.response.status);
                        console.log(error.response.headers);
                    } else if (error.request) {
                        console.log(error.request);
                    } else {
                        console.log('Error', error.message);
                    }
                    console.log(error.config);
                });
            },
        }
    }
</script>

<style>
    .has-error .checkbox, .has-error .checkbox-inline, .has-error .control-label, .has-error .help-block, .has-error .radio, .has-error .radio-inline, .has-error.checkbox label, .has-error.checkbox-inline label, .has-error.radio label, .has-error.radio-inline label {
        color: #ff0e10;
    }

    .has-error .form-control {
        border-color: #ff0e10;
    }
</style>