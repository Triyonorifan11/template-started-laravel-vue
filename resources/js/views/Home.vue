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
import globalConfig from "../config/config";
export default {
    data() {
        return {
            baseUrl: baseUrl,
            ROLE_ADMIN: globalConfig.role.admin,
            SUPER_ADMIN: globalConfig.role.super_admin,
            CONSUMER: globalConfig.role.customer,
            DEVELOPER: globalConfig.role.developer,
            ROLE_REVIEWER: globalConfig.role.reviewer,
        };
    },
    mounted() {        
        if (this.ROLE_ADMIN == this.$store.state.profile.roleId) {
            this.$router.push({
                name: "dashboard",
            });
        } else if(this.SUPER_ADMIN == this.$store.state.profile.roleId){
            this.$router.push({
                name: "dashboard",
            });
        }else if(this.ROLE_REVIEWER == this.$store.state.profile.roleId){
            this.$router.push({
                name: "dashboard",
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
