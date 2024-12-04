import React, { useState, useEffect } from "react";

const Home = () => {
    const images = [
        "/storage/2.png",
        "/storage/3.png",
        "/storage/4.png",
        "/storage/5.png",
        "/storage/1.png",
    ];

    const [currentIndex, setCurrentIndex] = useState(0);

    useEffect(() => {
        const interval = setInterval(() => {
            setCurrentIndex((prevIndex) => (prevIndex + 1) % images.length);
        }, 3000);

        return () => clearInterval(interval);
    }, [images.length]);

    return (
        <div className="min-h-screen bg-gray-100 flex flex-col items-center justify-center">
            <div className="text-center mb-8">
                <h1 className="text-4xl font-bold text-teal-600">
                    Selamat Datang di Teyvat Nexus
                </h1>
                <p className="text-gray-600 mt-2">
                    Nikmati berbagai fitur menarik dari website kami!
                </p>
            </div>
            <div className="relative max-w-3xl w-full bg-white shadow-lg rounded-lg overflow-hidden">
                <div className="relative h-80">
                    {images.map((image, index) => (
                        <div
                            key={index}
                            className={`absolute inset-0 transition-opacity duration-700 ${
                                index === currentIndex ? "opacity-100" : "opacity-0"
                            }`}
                        >
                            <img
                                src={image}
                                alt={`Slide ${index + 1}`}
                                className="w-full h-full object-cover"
                            />
                        </div>
                    ))}
                </div>
                <div className="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                    {images.map((_, index) => (
                        <div
                            key={index}
                            className={`h-3 w-3 rounded-full ${
                                index === currentIndex
                                    ? "bg-teal-600 scale-110"
                                    : "bg-gray-300"
                            } transition-transform duration-300`}
                        ></div>
                    ))}
                </div>
            </div>
        </div>
    );
};

export default Home;
