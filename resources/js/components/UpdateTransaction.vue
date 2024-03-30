<template>
    <div>
        <h3 class="text-center">Make Payment</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateTransaction">
                    <div class="form-group">
                        <label>Transaction ID</label>
                        <input type="text" class="form-control" v-model="payment.transId">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" class="form-control" v-model="payment.status">
                    </div>
                    <button class="btn btn-primary mt-3">Update Transaction</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                payment: {}
            }
        },
        methods: {
            updateTransaction() {
                this.axios
                    .put('/api/update-transaction', this.payment)
                    .then(response => {
                        if(response.data.message){
                            alert(response.data.message)
                        }
                    })
                    .catch(err => {
                        if (err.response.data.error) {
                            alert(err.response.data.error);
                        }

                    })
            }
        }
    }
</script>
