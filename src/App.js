import React, { useState } from "react";
import "./App.css";

function App() {
  const [input, setInput] = useState("");

  const handleClick = (value) => {
    setInput((prev) => prev + value);
  };

  const clear = () => setInput("");

  const calculate = () => {
    try {
      setInput(Function("return " + input)().toString());
    } catch {
      setInput("Error");
    }
  };

  const buttons = [
    "C", "+/-", "%", "/",
    "7", "8", "9", "*",
    "4", "5", "6", "-",
    "1", "2", "3", "+",
    "0", ".", "="
  ];

  return (
    <div className="app">
      <div className="calculator">
        <div className="display">{input || "0"}</div>

        <div className="buttons">
          {buttons.map((btn) => (
            <button
              key={btn}
              className={
                btn === "=" ? "equals" :
                ["+", "-", "*", "/"].includes(btn) ? "operator" :
                ["C", "+/-", "%"].includes(btn) ? "function" :
                ""
              }
              onClick={() => {
                if (btn === "C") clear();
                else if (btn === "=") calculate();
                else if (btn === "+/-") setInput((prev) => prev.startsWith("-") ? prev.slice(1) : "-" + prev);
                else handleClick(btn);
              }}
            >
              {btn}
            </button>
          ))}
        </div>
      </div>
    </div>
  );
}

export default App;