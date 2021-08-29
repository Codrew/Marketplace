<template>
    <div>
        <!-- Button trigger modal -->
        <button
            type="button"
            class="btn btn-danger"
            data-toggle="modal"
            data-target="#exampleModal"
        >
            Send Message
        </button>

        <!-- Modal -->
        <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Send message to {{ sellerName }}
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <textarea
                            v-model="body"
                            class="form-control"
                            placeholder="please write your message.."
                        >
                        </textarea>
                        <p
                            v-if="successMessage"
                        >
                        Your message has been successfully send
                        </p>
                    </div> 
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                        >
                            Close
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary"
                            @click.prevent="sendMessage()"
                        >
                            Send Message
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["sellerName", "userId", "reciverId", "adId"],

    data() {
        return {
            body: "",
            successMessage: false
        };
    },

    methods: {
        sendMessage() {
            if(this.body == ''){
                alert('Please write our message')
            }else{
            axios
                .post('/send/message', {
                    body: this.body,
                    reciverId: this.reciverId,
                    userId: this.userId,
                    adId: this.adId
                })
                .then((response) => {
                this.body = "", 
                this.successMessage = true;
                });
            }
        }
    }
};
</script>
