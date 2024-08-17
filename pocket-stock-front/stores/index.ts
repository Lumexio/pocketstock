import { defineStore } from 'pinia';

export const useStore = defineStore({
  id: 'storeIndex',
  state: () => ({
    bearerToken: null,
    role: 0,
    userDetails: {},
  }),
  actions: {
    setBearerToken(token: any) {
      this.bearerToken = token;
    },
    clearBearerToken() {
      this.bearerToken = null;
    },
    setRole(role: number) {
      this.role = role;
    },
    clearRole() {
      this.role = 0;
    },
    setUserDetails(userDetails: any) {
      this.userDetails = userDetails;
    },
    clearUserDetails() {
      this.userDetails = {};
    },
    logout() {
      this.clearBearerToken();
      this.clearRole();
      this.clearUserDetails();
    },
  },
  getters: {
    isAuthenticated(): any {
      return this.bearerToken || null;
    },
    hasRole(): any {
      return this.role || 0;
    },
    getUserDetails(): any {
      return this.userDetails || {};
    },
  },
  persist: true,
});
