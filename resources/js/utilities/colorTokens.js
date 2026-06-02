/**
 * Design tokens untuk tema warna
 * Sesuai dengan CSS variables dari mockup
 */
export const colorTokens = {
    primary: {
        yellow: "#fddb00",
        red: "#ea1f27",
        blue: "#0780c2",
    },
    secondary: {
        yellowBright: "#ffe940",
        bluePale: "#e8f4fd",
        redPale: "#fdecec",
    },
    text: {
        ink: "#1c1c22",
        mid: "#5a5a6a",
        dim: "#9898a8",
    },
    base: {
        white: "#ffffff",
        gray: "#efefef",
        border: "#dedede",
    },
};

/**
 * Utility untuk mendapatkan CSS variable dengan fallback
 */
export function getCSSVariable(name) {
    return `var(--${name})`;
}

/**
 * Mapping nama variabel CSS ke nilai
 */
export const cssVariableMap = {
    Y: colorTokens.primary.yellow,
    R: colorTokens.primary.red,
    B: colorTokens.primary.blue,
    G: colorTokens.base.gray,
    W: colorTokens.base.white,
    Y2: colorTokens.secondary.yellowBright,
    B2: colorTokens.secondary.bluePale,
    R2: colorTokens.secondary.redPale,
    INK: colorTokens.text.ink,
    MID: colorTokens.text.mid,
    DIM: colorTokens.text.dim,
    BRD: colorTokens.base.border,
};
