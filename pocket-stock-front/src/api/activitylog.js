import axios from "axios";
//import store from "@/store";

axios.defaults.withCredentials = true;
axios.defaults.baseURL = "http://127.0.0.1:8000/";


export function getActivitylog(activitylogArray) {
  return new Promise((resolve, reject) => {
    axios
      .get("api/activitylog")
      .then((response) => {

        const activitylog = response.data.payload;
        const stats = response.status;
        activitylog.forEach((element) => {
          let datos = {
            id: element.id,
            accion: element.description,
            causername: element.name,
            createdat: element.created_at,
            updatedat: element.updated_at,
            properties: JSON.parse(element.properties)
          };
          if (!datos) return;

          activitylogArray.push(datos);
        });
        resolve({
          stats, activitylogArray
        });
      })
      .catch((error) => { console.log(error); reject(error); });
  });
}


export default { getActivitylog }