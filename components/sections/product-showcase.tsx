"use client"

import { useState } from "react"
import { ShoppingCart, Star } from "lucide-react"
import { Button } from "@/components/ui/button"

const products = [
  {
    id: 1,
    name: "Premium Wireless Headphones",
    price: 299.99,
    image: "/wireless-headphones.jpg",
    rating: 4.8,
    reviews: 324,
    badge: "bestseller",
  },
  {
    id: 2,
    name: "Smart Watch Pro",
    price: 449.99,
    image: "/smart-watch.jpg",
    rating: 4.9,
    reviews: 512,
    badge: "featured",
  },
  {
    id: 3,
    name: "Ultra HD Camera",
    price: 1299.99,
    image: "/ultra-hd-camera.jpg",
    rating: 4.7,
    reviews: 198,
    badge: "new",
  },
  {
    id: 4,
    name: "Portable Speaker",
    price: 199.99,
    image: "/portable-speaker.jpg",
    rating: 4.6,
    reviews: 287,
    badge: "sale",
  },
]

export function ProductShowcase() {
  const [cart, setCart] = useState<number[]>([])

  const toggleCart = (id: number) => {
    setCart((prev) => (prev.includes(id) ? prev.filter((item) => item !== id) : [...prev, id]))
  }

  return (
    <section id="products" className="py-20 px-4 sm:px-6 lg:px-8 bg-card/30">
      <div className="max-w-7xl mx-auto">
        <div className="text-center mb-16 space-y-4">
          <h2 className="text-4xl sm:text-5xl font-bold text-foreground">Featured Products</h2>
          <p className="text-lg text-muted-foreground max-w-2xl mx-auto">
            Browse our curated collection of premium products with intelligent recommendations and real-time inventory
            management
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          {products.map((product) => (
            <div
              key={product.id}
              className="group rounded-xl border border-border bg-background overflow-hidden hover:shadow-lg transition-all duration-300 hover:border-primary/50"
            >
              <div className="relative overflow-hidden bg-muted h-48">
                <img
                  src={product.image || "/placeholder.svg"}
                  alt={product.name}
                  className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                />
                <div className="absolute top-3 right-3">
                  <span className="px-3 py-1 rounded-full text-xs font-semibold bg-primary text-primary-foreground capitalize">
                    {product.badge}
                  </span>
                </div>
              </div>

              <div className="p-4 space-y-4">
                <div>
                  <h3 className="font-semibold text-foreground line-clamp-2 mb-2">{product.name}</h3>
                  <div className="flex items-center gap-1">
                    <div className="flex gap-0.5">
                      {[...Array(5)].map((_, i) => (
                        <Star
                          key={i}
                          className={`w-4 h-4 ${
                            i < Math.floor(product.rating) ? "fill-accent text-accent" : "text-muted"
                          }`}
                        />
                      ))}
                    </div>
                    <span className="text-sm text-muted-foreground">({product.reviews})</span>
                  </div>
                </div>

                <div className="flex items-center justify-between">
                  <span className="text-2xl font-bold text-foreground">${product.price}</span>
                </div>

                <Button
                  onClick={() => toggleCart(product.id)}
                  className={`w-full flex items-center justify-center gap-2 ${
                    cart.includes(product.id)
                      ? "bg-primary hover:bg-primary/90 text-primary-foreground"
                      : "bg-card border border-border hover:bg-muted text-foreground"
                  } transition`}
                >
                  <ShoppingCart className="w-4 h-4" />
                  {cart.includes(product.id) ? "In Cart" : "Add to Cart"}
                </Button>
              </div>
            </div>
          ))}
        </div>

        {cart.length > 0 && (
          <div className="mt-8 p-4 rounded-lg border border-primary/30 bg-primary/5 text-center">
            <p className="text-foreground">
              You have <span className="font-bold text-primary">{cart.length}</span> item(s) in your cart
            </p>
          </div>
        )}
      </div>
    </section>
  )
}
