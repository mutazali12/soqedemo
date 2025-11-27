const nextConfig = {
  typescript: {
    ignoreBuildErrors: true,
  },
  images: {
    unoptimized: true,
  },
  output: 'export',
  basePath: process.env.NEXT_PUBLIC_BASE_PATH || '',
  trailingSlash: true,
  reactStrictMode: true,
}

export default nextConfig
