declare namespace App.Data.Chat {
export type ChatData = {
id: number;
totalMessages: number;
user: App.Data.User.UserData;
};
export type MessageData = {
id: number;
message: string | null;
createdAt: string | null;
user: App.Data.User.UserData;
isOwn: boolean;
};
export type SendMessageData = {
message: string;
};
}
declare namespace App.Data.User {
export type LoginData = {
email: string;
password: string;
};
export type UserData = {
id: number;
name: string | null;
email: string;
};
}
