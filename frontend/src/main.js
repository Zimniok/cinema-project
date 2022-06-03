import { createApp, provide, h } from "vue";
import App from "./App.vue";
import router from "./router";
import { ApolloLink, concat, split } from "apollo-link";
import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";

import {
  ApolloClient,
  createHttpLink,
  InMemoryCache,
} from "@apollo/client/core";
import { DefaultApolloClient } from "@vue/apollo-composable";

// HTTP connection to the API
const httpLink = createHttpLink({
  // You should use an absolute URL here
  uri: "http://cinema.eastus.cloudapp.azure.com:8000/graphql",
});


const authMiddleware = new ApolloLink((operation, forward) => {
  // add the authorization to the headers
const token = localStorage.getItem('token');
  operation.setContext({
    headers: {
      authorization: token ? `Bearer ${token}` : "",
    },
  });
  return forward(operation);
});
export const apolloClient = new ApolloClient({
  link: concat(authMiddleware, httpLink),
  cache: new InMemoryCache(),
});


const app = createApp({
  setup() {
    provide(DefaultApolloClient, apolloClient);
  },

  render: () => h(App),
});

app.use(router);

app.mount("#app");
