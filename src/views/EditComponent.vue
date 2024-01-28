<template>
    <div class="row mt-0">
        <div class="about">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Fill the form</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label htmlFor="test_text">Test</label>
                            <input v-model="formData.test_text" type="text" class="form-control" id="test_text"
                                name="test_text" />
                        </div>
                        <div class="form-group">
                            <label htmlFor="test_text_area">TextArea</label>
                            <textarea v-model="formData.test_text_area" class="form-control" id="test_text_area" rows="3"
                                name="test_text_area"></textarea>
                        </div>
                        <div class="form-group py-2">
                            <label htmlFor="test_select">Select Box</label>
                            <!-- <input v-model="formData.test_select" type="text" class="form-control" id="test_select" name="test_select" /> -->
                            <select v-model="formData.test_select" class="form-control" id="test_select" name="test_select">
                                <option value="option_one">Option One</option>
                                <option value="option_two">Option Two</option>
                            </select>
                        </div>
                        <div class="form-group py-2">
                            <label htmlFor="radio_one">Radio</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" id="radio_one" value="radio_one" v-model="formData.radio_option" /> &nbsp;
                            Option One
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" id="radio_two" value="radio_two" v-model="formData.radio_option" /> &nbsp;
                            Option Two
                        </div>
                        <div class="form-group">
                            <input type="checkbox" id="test_check" v-model="formData.test_check"
                                :checked="formData.test_check" />
                            &nbsp;<label htmlFor="test_check">Check Box</label>
                        </div>
                        <button @click="handleupdate()" :disabled="isSaving" type="button"
                            class="btn btn-outline-primary mt-3 float-end">
                            Update Form
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
  
<script>

import axios from "axios";
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

export default {
    name: 'EditComponent',

    data() {
        return {
            data: {},
            data_id: '',
            formData: {
                id: '',
                test_text: '',
                test_text_area: '',
                test_select: '',
                radio_option: '',
                test_check: ''
            },
        }
    },

    methods: {
        async getData() {
            let url = "http://127.0.0.1:8000/api/create-data/" + this.$route.params.id;
            await axios.get(url, this.formData, (res) => {
                console.log(res);
            })
                .then((res) => {
                    this.formData.id = res.data.data.id;
                    this.formData.test_text = res.data.data.test_text;
                    this.formData.test_text_area = res.data.data.test_text_area;
                    this.formData.test_select = res.data.data.test_select;
                    this.formData.radio_option = res.data.data.radio_option;
                    this.formData.test_check = res.data.data.test_check;
                    // this.data = res.data.data;
                })
                .catch(error => {
                    // const $toast = useToast();
                    console.log(error);
                    // $toast.error("Oops! Something went wrong."+error);
                })
                .finally(() => {

                });
        },

        async handleupdate() {
            let url = "http://127.0.0.1:8000/api/create-data/update";
            await axios.post(url, this.formData, (res) => {
                console.log(res);
            })
                .then(() => {
                    const $toast = useToast();
                    $toast.success('Info Stored!');
                })
                .catch(error => {
                    const $toast = useToast();
                    console.log(error.response.data.errors);
                    $toast.error("Oops! Something went wrong.");
                })
                .finally(() => {

                });
            // console.log(this.formData);
        },

    },

    mounted() {
        this.getData();
    },
}
</script>
  
<style></style>
  