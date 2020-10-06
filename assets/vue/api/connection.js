import axios from "axios";
import Routing from "../router/routing";

const client = axios.create({withCredentials: true})

export default {
    create(data) {
        return client.post(Routing.generate('connection_create'), data);
    },
    current() {
        return client.get(Routing.generate('connection_get'));
    }
}
