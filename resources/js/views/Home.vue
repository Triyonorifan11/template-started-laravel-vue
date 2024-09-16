<template>
    <div>
        <div
            class="p-8 d-flex justify-content-center align-items-center"
            style="min-height: 100vh; width: 100%"
        >
            <app-loader></app-loader>
        </div>
    </div>
</template>

<script>
import Api from "@/services/api";
export default {
    data() {
        return {
            baseUrl: baseUrl,
            ROLE_ADMIN: import.meta.env.VITE_ROLE_ADMIN,
            SUPER_ADMIN: import.meta.env.VITE_ROLE_SUPER_ADMIN,
            CONSUMER: import.meta.env.VITE_ROLE_CONSUMER,
            DEVELOPER: import.meta.env.VITE_ROLE_DEVELOPER,
            ROLE_REVIEWER: import.meta.env.VITE_ROLE_REVIEWER,
        };
    },
    mounted() {
        console.log(this.$store.state.profile);
        console.log(import.meta.env.VITE_ROLE_SUPER_ADMIN);
        
        if (this.ROLE_ADMIN == this.$store.state.profile.roleId) {
            this.$router.push({
                path: "/booking",
            });
        } else if(this.SUPER_ADMIN == this.$store.state.profile.roleId){
            this.$router.push({
                path: "/booking",
            });
        }else if(this.ROLE_REVIEWER == this.$store.state.profile.roleId){
            this.$router.push({
                path: "/booking",
            });
        }
        else if (this.CONSUMER == this.$store.state.profile.roleId) {
            const urlParams = new URLSearchParams(window.location.search);
            const myParam = urlParams.get('code');
            if(myParam){
                this.$router.push({ path: "/reguler/booking", query: {code: myParam}});
            }else{
                // window.location.href = `${this.baseUrl}/reguler/booking`
                this.$router.push({
                    path: "/reguler/booking",
                });
            }
        } 
    },
};
</script>
