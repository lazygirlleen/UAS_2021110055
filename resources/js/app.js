import React from "react";
import ReactDOM from "react-dom/client";
import Home from "./components/Home";

const root = document.getElementById("root");
if (root) {
    ReactDOM.createRoot(root).render(<Home />);
}
