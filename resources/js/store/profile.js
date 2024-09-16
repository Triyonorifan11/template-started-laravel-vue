import globalConfig from "../config/config";

const profile = {
    namespaced: true,
    state: {
        uuid: '',
        name: '',
        roleId: '',
        roleName: '',
        consultantId: '',
        consultantInternal: false,
        districtCounstantId: '',
        districtCounstantName: '',
    },
    mutations: {
        SET_PROFILE_DATA(state, payload) {
            state.isLoggedIn = payload ? true : false;
            // console.log(payload);
            if (payload) {
                state.uuid = payload.id;
                let ROLE_ADMIN =
                    globalConfig.role.admin;
                let SUPER_ADMIN =
                    globalConfig.role.super_admin;
                let CONSUMER =
                    globalConfig.role.customer;
                
                // if (payload.role.slug == ROLE_ADMIN || payload.role.slug == SUPER_ADMIN) {
                //     state.name = payload.name;
                // } else {
                //     state.name = payload.name;
                // }
                state.name = payload.name;
                state.uuid = payload.id;
                state.roleId = payload.role ? payload.role.slug : '';
                state.roleName = payload.role ? payload.role.name : '';
                state.email = payload.email;
                state.phone = payload.phone;
                state.roleUuid = payload.role.id;


            } else {
                state.id = '';
                state.userableId = '';
                state.userableName = '';
                state.roleId = '';
                state.roleName = '';
                state.consultantInternal = false;
                state.districtCounstantId = '';
                state.districtCounstantName = '';
                state.consultantId = '';
            }
        }
    }
}

export default profile;
