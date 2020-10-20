import axios from "axios";
import Routing from "../router/routing";

const client = axios.create({withCredentials: true})

export default {
    create(data) {
        return client.post(Routing.generate('connection_create'), data);
    },
    save(data) {
        return client.post(Routing.generate('connection_save'), data);
    },
    saveAccount(data) {
        return client.post(Routing.generate('account_save'), data);
    },
    current() {
        return client.get(Routing.generate('connection_get'));
    }
}
