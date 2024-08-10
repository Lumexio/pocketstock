import axios from "axios";
import store from "@/store";

axios.defaults.withCredentials = true;
axios.defaults.baseURL = "http://" + window.location.hostname/*"127.0.0.1"*/ + ":8000";

export function Logout() {
  return new Promise((resolve, reject) => {
    axios
      .get("api/logout")
      .then((response) => {
        const data = response.data;
        const status = response.status;
        resolve({
          data, status
        });
      })
      .catch((error) => {
        reject(error.response);
        if (error.response.status != 400 && error.response.status != 200) {
          store.commit("setdanger", true);
          setTimeout(function () {
            store.commit("setdanger", null);
          }, 2000);
        }
      });
  })
}
export default { Logout };