export interface User {
    name: string;
    lastname: string;
    email: string;
    phone?: string;
}

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>,
> = T & {
    auth: {
        user: User;
    };
};
